<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareasRequestCreate;
use App\Http\Requests\TareasRequestUpdate;
use App\Models\Clientes;
use App\Models\Provincias;
use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;

class TareasCtrl extends Controller
{
    private $tareas;
    private $usuarios;
    private $provincias;
    private $clientes;

    /**
     * Constructor. Instancia los modelos necesarios.
     */
    public function __construct()
    {
        $this->tareas = new Tareas();
        $this->usuarios = new Usuarios();
        $this->provincias = new Provincias();
        $this->clientes = new Clientes();
    }

    /**
     * Muestra una vista con todas las tareas
     */
    public function index()
    {
        $tareas = $this->tareas->getTareas();
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function mostrarTareasPendientes(){
        $tareas = $this->tareas->getTareasPendientes();
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function completarTarea(Tareas $tarea){
        return view('tareas.completar_tarea', compact('tarea'));
    }

    /**
     * Muestra el formulario para crear una nueva tarea
     */
    public function create()
    {
        $operarios = $this->usuarios->getOperarios();
        $provincias = $this->provincias->getProvincias();
        $tarea = new Tareas();
        return view('tareas.form_tarea', compact('operarios', 'provincias', 'tarea'));
    }

    /**
     * Guarda una nueva tarea en la base de datos
     */
    public function store(TareasRequestCreate $requestTarea)
    {
        $validated = $requestTarea->validated();
        $tarea = Tareas::create($validated);
        return redirect()->route('tareas.show', $tarea)
            ->with('mensaje', 'Tarea creada correctamente');
    }

    /**
     * Muestra la vista con una tarea en concreto
     * @param Tareas tarea a mostrar
     * @return void
     */
    public function show(Tareas $tarea)
    {
        return view('tareas.mostrar_tarea', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tareas $tarea)
    {
        $operarios = $this->usuarios->getOperarios();
        $provincias = $this->provincias->getProvincias();
        return view('tareas.form_actualizar_tarea', compact('operarios', 'provincias', 'tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareasRequestUpdate $requestTarea, Tareas $tarea)
    {
    // composer require laravel/ui bootstrap

        $validated = $requestTarea->validated();
        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('mensaje', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tareas $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('mensaje', 'Tarea eliminada correctamente');
    }

    /**
     * Muestra una vista para confirmar el borrado de una tarea
     *
     * @param integer $id id de la tarea a borrar
     * @return void
     */
    public function confirmarBorrarTarea(Tareas $tarea){
        return view('tareas.borrar_tarea', compact('tarea'));
    }

    /**
     * Validamos el formulario de confirmación de tarea
     * 
     * 
     */

    public function confirmarTarea(Request $request, Tareas $tarea)
    {
        $validated = $request->validate([
            'estado' => ['required', 'size:1', 'in:R,C'],
            'fecha_realizacion' => ['required', 'date', 'after:' . $tarea->fecha_creacion],
            'anotaciones_posteriores' => ['nullable', 'string']
        ]);

        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('mensaje', 'Tarea completada correctamente');
    }
}
