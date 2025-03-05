<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequestCreate;
use App\Http\Requests\TareaRequestUpdate;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\Usuario;

class TareasCtrl extends Controller
{

    public function __construct()
    {
        // Aplicar el middleware 'auth' a todas las acciones excepto 'create' y 'store'
        $this->middleware('auth')->except('create', 'store');

        // Aplicar middleware 'roles' para definir permisos por acción
        $this->middleware('roles:O,A')->only('index', 'show', 'mostrarTareasPendientes');
        $this->middleware('roles:O')->only('completarTarea', 'confirmarTarea');
        $this->middleware('roles:A')->only('edit', 'update', 'destroy', 'confirmarBorrarTarea');
    }

    /**
     * Muestra una vista con todas las tareas
     *
     * @return void
     */
    public function index()
    {
        if (auth()->user()->rol == 'O') {
            $tareas = Tarea::getTareasOperario(auth()->user()->id);
        } else {
            $tareas = Tarea::getTareas();
        }
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function mostrarTareasPendientes()
    {
        // $tareas = (auth()->user()->rol == 'O') ? $tareas = Tarea::getTareasPendientesOperario(auth()->user()->id) : $tareas = Tarea::getTareasPendientes();
        if (auth()->user()->isOperario()) {
            $tareas = Tarea::getTareasPendientesOperario(auth()->user()->id);
        } else{
            $tareas = Tarea::getTareasPendientes();
        }
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas sin operario asignado
     *
     * @return void
     */
    public function mostrarTareasSinOperario()
    {
        $tareas = Tarea::getTareasSinOperario();
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra el formulario para crear una nueva tarea
     *
     * @return void
     */
    public function create()
    {
        $operarios = Usuario::getOperarios();
        $provincias = Provincia::getProvincias();
        $clientes = Cliente::getClientes();
        $tarea = new Tarea();
        return view('tareas.form_crear_tarea', compact('operarios', 'provincias', 'tarea', 'clientes'));
    }

    /**
     * Guarda una nueva tarea en la base de datos
     *
     * @param TareaRequestCreate $requestTarea
     * @return void
     */
    public function store(TareaRequestCreate $requestTarea)
    {
        // Validamos el formulario con las reglas de creación
        $validated = $requestTarea->validated();
        
        // Si es usuario añadimos el cliente_id a mano:
        if (!auth()->check()){
            $validated['cliente_id'] = Cliente::getIdFromNifTelephone($validated['telefono'], $validated['nif_cif']);
        }

        // Creamos la tarea y redirijimos
        $tarea = Tarea::create(collect($validated)->except(['telefono', 'nif_cif'])->toArray());
        return redirect()->route('tareas.show', $tarea)
            ->with('success', 'Tarea creada correctamente');
    }

    /**
     * Muestra la vista con una tarea en concreto
     * @param Tareas tarea a mostrar
     * @return void
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.mostrar_tarea', compact('tarea'));
    }

    /**
     * Muestra el formulario para actualizar una tarea
     *
     * @param Tarea $tarea
     * @return void
     */
    public function edit(Tarea $tarea)
    {
        $operarios = Usuario::getOperarios();
        $provincias = Provincia::getProvincias();
        $clientes = Cliente::getClientes();
        return view('tareas.form_actualizar_tarea', compact('operarios', 'provincias', 'tarea', 'clientes'));
    }

    /**
     * Actualiza una tarea en la base de datos
     *
     * @param TareaRequestUpdate $requestTarea
     * @param Tarea $tarea
     * @return void
     */
    public function update(TareaRequestUpdate $requestTarea, Tarea $tarea)
    {
        // Validamos con las reglas
        $validated = $requestTarea->validated();

        // Comprobamos si se han subido los ficheros al formulario y procesamos cada uno por separado
        if ($requestTarea->hasFile('fichero')) {
            // Guardamos el fichero en su carpeta correspondiente
            $fichero_name = $requestTarea->file('fichero')->store('/', 'ficheros');
            // Sobreescribimos el nombre del fichero que se almacenará por el hasheado
            $validated['fichero'] = $fichero_name;
        }

        if ($requestTarea->hasFile('foto')) {
            $foto_name = $requestTarea->file('foto')->store('/', 'fotos');
            $validated['foto'] = $foto_name;
        }

        // Actualizamos la tarea
        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente');
    }

    /**
     * Elimina una tarea de la base de datos
     *
     * @param Tarea $tarea
     * @return void
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
    }

    /**
     * Muestra una vista para confirmar el borrado de una tarea
     *
     * @param integer $id id de la tarea a borrar
     * @return void
     */
    public function confirmarBorrarTarea(Tarea $tarea){
        return view('tareas.borrar_tarea', compact('tarea'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return view
     */
    public function completarTarea(Tarea $tarea){
        return view('tareas.completar_tarea', compact('tarea'));
    }

    /**
     * Confirma la tarea completada
     *
     * @param Request $request
     * @param Tarea $tarea
     * @return void
     */
    public function confirmarTarea(Request $request, Tarea $tarea)
    {
        $validated = $request->validate([
            'estado' => ['required', 'size:1', 'in:R,C'],
            'fecha_realizacion' => ['required', 'date', 'after:' . $tarea->fecha_creacion],
            'anotaciones_posteriores' => ['nullable', 'string']
        ]);

        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('success', 'Tarea completada correctamente');
    }
}