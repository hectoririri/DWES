<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareasRequestCreate;
use App\Models\Provincias;
use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\Usuarios;

class TareasCtrl extends Controller
{
    private $tareas;
    private $usuarios;
    private $provincias;

    /**
     * Constructor. Instancia los modelos necesarios.
     */
    public function __construct()
    {
        $this->tareas = new Tareas();
        $this->usuarios = new Usuarios();
        $this->provincias = new Provincias();
    }

    /**
     * Muestra una vista con todas las tareas
     */
    public function index()
    {
        $tareas = $this->tareas->getTareas();
        return view('mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function mostrarTareasPendientes(){
        $tareas = $this->tareas->getTareasPendientes();
        return view('mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function completarTarea(Tareas $tarea){
        return view('completar_tarea', compact('tarea'));
    }

    /**
     * Muestra el formulario para crear una nueva tarea
     */
    public function create()
    {
        $operarios = $this->usuarios->getOperarios();
        $provincias = $this->provincias->getProvincias();
        $tarea = new Tareas();
        return view('formulario_tarea', compact('operarios', 'provincias', 'tarea'));
    }

    /**
     * Guarda una nueva tarea en la base de datos
     */
    public function store(TareasRequestCreate $request)
    {
        $validated = $request->validated();
        // como ha pasado ya creamos la tarea con los campos que estemos validando ->
        $tarea = Tareas::create($validated);
        return redirect()->route('tareas.show', $tarea)->with('mensaje', 'Tarea creada correctamente');
    }

    /**
     * Muestra la vista con una tarea en concreto
     * @param Tareas tarea a mostrar
     * @return void
     */
    public function show(Tareas $tarea)
    {
        return view('mostrar_tarea', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Muestra una vista para confirmar el borrado de una tarea
     *
     * @param integer $id id de la tarea a borrar
     * @return void
     */
    public function confirmarBorrarTarea(Tareas $tarea){
        return view('confirmar_borrar_tarea', compact('tarea'));
    }
}
