<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\GestorErrores;
use App\Models\Utiles;
use App\Models\Usuarios;
use App\Models\SesionUsuario;

class TareasCtrl extends Controller
{
    /** 
     * Clase para gestionar las tareas
     * @var Tareas clase para gestionar las tareas
     * @var Utiles clase para gestionar las utilidades
     * @var GestorErrores clase para gestionar los errores
     * @var Usuarios clase para gestionar los usuarios
     */
    private $tareas;
    private $utiles;
    private $gestorErrores;
    private $usuarios;
    private $sesion_usuario;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->tareas = new Tareas();
        $this->utiles = new Utiles();
        $this->gestorErrores = new GestorErrores();
        $this->usuarios = new Usuarios();
        $this->sesion_usuario = SesionUsuario::getInstance();
    }

    /**
     * Método para mostrar el formulario de alta de tareas
     * @param int $id de la tarea si se va a modificar
     * @return vista
     */
    public function formularioTarea(int $id = null)
    {
        $this->sesion_usuario->onlyLogged();
        if (!$this->sesion_usuario->isAdmin()) {
            header('Location: ' . miurl('home'));
            exit();
        }
        $tipo = $id ? "modificar" : "alta";
        $tarea = $id ? $this->tareas->recogerTarea($id) : []; // Si es modificar recoge la tarea

        if ($id) { // Si es modificar
            $this->utiles->emptyTarea($tarea); // Comprueba si la tarea existe
        }

        if ($_POST) {
            $this->utiles->validacionesFormTarea($this->gestorErrores); // Validaciones del formulario
            if ($this->gestorErrores->hayErrores()) {
                return view('formulario_tarea', [ // Muestra la vista con los errores
                    'errores' => $this->gestorErrores,
                    'tarea' => $tarea,
                    'utiles' => $this->utiles,
                    'titulo' => $this->utiles->tituloFormulario($tipo),
                    'objTareas' => $this->tareas,
                    'operarios' => $this->usuarios->recogerOperarios()
                ]);
            } else {
                // Crea o modifica la tarea según el tipo
                $tipo == "alta" ? $this->tareas->crearTarea() : $this->tareas->modificarTarea($id);
                header('Location: ' . miurl('mostrar/tareas'));
                exit();
            }
        } else {
            return view('formulario_tarea', [ // Muestra la vista con los datos de la tarea si es modificar o vacía si es alta
                'errores' => $this->gestorErrores,
                'tarea' => $tarea,
                'utiles' => $this->utiles,
                'titulo' => $this->utiles->tituloFormulario($tipo),
                'objTareas' => $this->tareas,
                'operarios' => $this->usuarios->recogerOperarios()
            ]);
        }
    }

    /**
     * Método para completar una tarea
     * @param int $id de la tarea
     * @return vista
     */
    public function completarTarea(int $id)
    {
        $this->sesion_usuario->onlyLogged();
        if ($this->sesion_usuario->isAdmin()) {
            header('Location: ' . miurl('home'));
            exit();
        }
        if ($_POST) {
            // Validaciones para completar la tarea 
            $this->utiles->validacionesCompletarTarea($this->gestorErrores, $this->tareas->recogerTarea($id));
            if ($this->gestorErrores->HayErrores()) {
                $this->utiles->emptyTarea($this->tareas->recogerTarea($id)); // Comprueba si la tarea existe
                return view('completar_tarea', [ // Muestra la vista con los errores
                    'tarea' => $this->tareas->recogerTarea($id),
                    'errores' => $this->gestorErrores,
                    'utiles' => $this->utiles
                ]);
            }
            // Se completa la tarea y se redirige a la página de la tarea
            $this->tareas->completarTarea($id);
            header('Location: ' . miurl('mostrar/tarea/' . $id));
            exit();
        } else {
            $this->utiles->emptyTarea($this->tareas->recogerTarea($id)); // Comprueba si la tarea existe
            return view('completar_tarea', [ // Muestra la vista con los datos de la tarea
                'tarea' => $this->tareas->recogerTarea($id),
                'errores' => $this->gestorErrores,
                'utiles' => $this->utiles
            ]);
        }
    }

    /**
     * Método para mostrar las tareas
     * @return vista
     */
    public function mostrarTareas()
    {
        $this->sesion_usuario->onlyLogged();
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $elementosPorPagina = 4;    
        $totalElementos = count($this->tareas->recogerTareas());
        $totalPaginas = ceil($totalElementos / $elementosPorPagina);

        // Validar que la página actual no sea inferior a 1 o superior al número de páginas disponibles
        if ($paginaActual <= 1) {
            $paginaActual = 1;
        } elseif ($paginaActual >= $totalPaginas) {
            $paginaActual = $totalPaginas;
        }

        $inicioLimit = ($paginaActual - 1) * $elementosPorPagina;
        $tareas = $this->tareas->recogerTareasPaginadas($inicioLimit, $elementosPorPagina);

        // Mostrar la vista con las tareas y la información de paginación
        return view('mostrar_tareas', [
            'tareas' => $tareas,
            'paginaActual' => $paginaActual,
            'totalPaginas' => $totalPaginas
        ]);
    }

    /**
     * Método para mostrar las tareas pendientes
     * @return vista
     */
    public function mostrarTareasPendientes($pagina = 1, $tareasPorPagina = 10)
    {
        // Recoge las tareas pendientes con paginación
        $tareas_pendientes = $this->tareas->recogerTareasPendientesPaginadas($pagina, $tareasPorPagina);
        $arrayTareas = $tareas_pendientes;
        $totalTareas = count($tareas_pendientes);
        $totalPaginas = ceil($totalTareas / $tareasPorPagina);

        return view('mostrar_tareas', [
            'tareas' => $arrayTareas,
            'paginaActual' => $pagina,
            'totalPaginas' => $totalPaginas
        ]);
    }

    /**
     * Método para mostrar el formulario de borrar una tarea
     * @param int $id de la tarea
     * @return vista
     */
    public function borrarTarea(int $id)
    {
        $this->sesion_usuario->onlyLogged();
        if (!$this->sesion_usuario->isAdmin()) {
            header('Location: ' . miurl('home'));
            exit();
        }
        if ($_POST) {
            // Borra la tarea y redirige a la página de tareas
            $this->tareas->borrarTarea($id);
            header('Location: ' . miurl('mostrar/tareas'));
            exit();
        } else {
            // Comprueba si la tarea existe y muestra la vista con los datos de la tarea
            $this->utiles->emptyTarea($this->tareas->recogerTarea($id));
            return view('borrar_tarea', [
                'tarea' => $this->tareas->recogerTarea($id),
                'id' => $id
            ]);
        }
    }

    /**
     * Método para mostrar una tarea
     * @param int $id de la tarea
     * @return vista
     */
    public function mostrarTarea(int $id)
    {
        $this->sesion_usuario->onlyLogged();
        // Comprueba si la tarea existe y muestra la vista con los datos de la tarea
        $this->utiles->emptyTarea($this->tareas->recogerTarea($id));
        $tarea = $this->tareas->recogerTarea($id);
        return view('mostrar_tarea', [
            'tarea' => $tarea
        ]);
    }
}
