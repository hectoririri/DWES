<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareasRequestCreate;
use App\Http\Requests\TareasRequestUpdate;
use App\Models\Cliente;
use App\Models\Clientes;
use App\Models\Provincia;
use App\Models\Provincias;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;

class TareasCtrl extends Controller
{


    /**
     * Muestra una vista con todas las tareas
     */
    public function index()
    {
        $tareas = Tarea::getTareas();
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function mostrarTareasPendientes(){
        $tareas = Tarea::getTareasPendientes();
        return view('tareas.mostrar_tareas', compact('tareas'));
    }

    /**
     * Muestra una vista con las tareas pendientes
     *
     * @return void
     */
    public function completarTarea(Tarea $tarea){
        return view('tareas.completar_tarea', compact('tarea'));
    }

    /**
     * Muestra el formulario para crear una nueva tarea
     */
    public function create()
    {
        $operarios = Usuario::getOperarios();
        $provincias = Provincia::getProvincias();
        $clientes = Cliente::getClientes();
        $tarea = new Tarea();
        return view('tareas.form_tarea', compact('operarios', 'provincias', 'tarea', 'clientes'));
    }

    /**
     * Guarda una nueva tarea en la base de datos
     */
    public function store(TareasRequestCreate $requestTarea)
    {
        $validated = $requestTarea->validated();
        
        // Si es usuario creamos la tarea de la siguiente manera:
        $validated['cliente_id'] = Cliente::getIdFromNifTelephone($validated['nif_cif'], $validated['telefono']);
        
        $tarea = Tarea::create($validated);
        return redirect()->route('tareas.show', $tarea)
            ->with('mensaje', 'Tarea creada correctamente');
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
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        $operarios = Usuario::getOperarios();
        $provincias = Provincia::getProvincias();
        $clientes = Cliente::getClientes();
        return view('tareas.form_actualizar_tarea', compact('operarios', 'provincias', 'tarea', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TareasRequestUpdate $requestTarea, Tarea $tarea)
    {
    // composer require laravel/ui bootstrap

        $validated = $requestTarea->validated();
        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('mensaje', 'Tarea actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
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
    public function confirmarBorrarTarea(Tarea $tarea){
        return view('tareas.borrar_tarea', compact('tarea'));
    }

    /**
     * Validamos el formulario de confirmación de tarea
     * 
     * 
     */

    public function confirmarTarea(Request $request, Tarea $tarea)
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