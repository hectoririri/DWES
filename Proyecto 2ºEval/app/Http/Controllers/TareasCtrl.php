<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;

class TareasCtrl extends Controller
{
    private $tareas;

    /**
     * Constructor. Instancia los modelos necesarios.
     */
    public function __construct()
    {
        $this->tareas = new Tareas();
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
    public function completarTarea(int $tarea){
        $tarea = $this->tareas->getTarea($tarea);
        return view('completar_tarea', compact('tarea'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = "Crear ";
        return view('formulario_tarea', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $tarea = $this->tareas->getTarea($id);
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
    public function confirmarBorrarTarea(int $id){
        $tarea = $this->tareas->getTarea($id);
        return view('confirmar_borrar_tarea', compact('tarea'));
    }
}
