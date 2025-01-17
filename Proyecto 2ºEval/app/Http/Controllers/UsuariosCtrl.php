<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Models\GestorErrores;
use App\Models\Utiles;
use App\Models\Usuarios;
use App\Models\SesionUsuario;

class UsuariosCtrl extends Controller
{
    /** 
     * Clase para gestionar los usuarios
     * @var Utiles clase para gestionar las utilidades
     * @var GestorErrores clase para gestionar los errores
     * @var Usuarios clase para gestionar los usuarios
     */
    private $utiles;
    private $gestorErrores;
    private $usuarios;
    private $sesion_usuario;

    /**
     * Constructor. Instancia los modelos necesarios.
     */
    public function __construct()
    {
        $this->utiles = new Utiles();
        $this->gestorErrores = new GestorErrores();
        $this->usuarios = new Usuarios();
        $this->sesion_usuario = SesionUsuario::getInstance();
    }

    /**
     * Muestra los usuarios de la base de datos.
     * @return View, vista con los usuarios
     */
    public function mostrarUsuarios()
    {
        $usuarios = $this->usuarios->recogerUsuarios();
        return view('mostrar_usuarios', ['usuarios' => $usuarios,]);
    }

    /**
     * Muestra un usuario de la base de datos.
     * @param int $id, id del usuario
     * @return View, vista con el usuario
     */
    public function mostrarUsuario(int $id)
    {
        // Comprueba si el usuario existe y redirige a la página de error si no
        $this->utiles->emptyUsuario($this->usuarios->recogerUsuario($id));
        // Recoge el usuario y lo muestra
        $usuario = $this->usuarios->recogerUsuario($id);
        return view('mostrar_usuario', ['usuario' => $usuario,]);
    }

    /**
     * Muestra el formulario de usuario.
     * @return View, formulario de usuario
     */
    public function formularioUsuario(int $id = null)
    {
        $tipo = $id ? "modificar" : "alta";
        // Usuario a modificar o vacío si es alta
        $usuario = $id ? $this->usuarios->recogerUsuario($id) : [];

        // Comprueba si el usuario existe y redirige a la página de error si no
        if ($id) {
            $this->utiles->emptyUsuario($usuario);
        }

        if ($_POST) {
            // Validaciones del formulario de usuario
            $this->utiles->validacionesFormUsuario($this->gestorErrores, $tipo);
            if ($this->gestorErrores->hayErrores()) {
                return view('formulario_usuario', [ 
                    'errores' => $this->gestorErrores,
                    'usuario' => $usuario,
                    'utiles' => $this->utiles,
                    'titulo' => $this->utiles->tituloFormulario($tipo),
                ]);
            } else {
                // Crea o modifica el usuario según el tipo y redirige a la página de usuarios
                $tipo == "alta" ? $this->usuarios->crearUsuario() : $this->usuarios->modificarUsuario($id);
                header('Location: ' . miurl('mostrar/usuarios'));
                exit();
            }
        } else {
            return view('formulario_usuario', [ // Muestra la vista con los datos del usuario si es modificar o vacía si es alta
                'errores' => $this->gestorErrores,
                'usuario' => $usuario,
                'utiles' => $this->utiles,
                'titulo' => $this->utiles->tituloFormulario($tipo),
            ]);
        }
    }

    /**
     * Borra un usuario de la base de datos.
     * @param int $id, id del usuario
     * @return View, vista de confirmación de borrado
     */
    public function borrarUsuario(int $id)
    {
        if ($_POST) {
            // Borra el usuario y redirige a la página de usuarios
            $this->usuarios->borrarUsuario($id);
            header('Location: ' . miurl('mostrar/usuarios'));
            exit();
        } else {
            // Comprueba si el usuario existe y redirige a la página de error si no
            $this->utiles->emptyUsuario($this->usuarios->recogerUsuario($id));
            return view('borrar_usuario', [
                'usuario' => $this->usuarios->recogerUsuario($id),
                'id' => $id
            ]);
        }
    }
}
