<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

include 'helpers.php';
// Rutas de login y home

Route::any('/home', function () {
    return view('home')->with('mostrarMenu', true);
});

// Rutas de tareas
Route::any('/formulario/alta/tarea', [TareasCtrl::class, 'formularioTarea']);
Route::any('/modificar/tarea/{id}', [TareasCtrl::class, 'formularioTarea'])->where('id', '[0-9]+');
Route::any('/completar/tarea/{id}', [TareasCtrl::class, 'completarTarea'])->where('id', '[0-9]+');

Route::any('/mostrar/tarea/{id}', [TareasCtrlR::class, 'show'])->where('id', '[0-9]+');
Route::get('/mostrar/tareas', [TareasCtrlR::class, 'index']);
Route::any('/mostrar/tareas/pendientes', [TareasCtrl::class, 'mostrarTareasPendientes']);

Route::any('/borrar/tarea/{id}', [TareasCtrl::class, 'borrarTarea'])->where('id', '[0-9]+');

// Rutas de usuarios
Route::any('/mostrar/usuarios', [UsuariosCtrl::class, 'mostrarUsuarios']);
Route::any('/mostrar/usuario/{id}', [UsuariosCtrl::class, 'mostrarUsuario'])->where('id', '[0-9]+');

Route::any('/formulario/alta/usuario', [UsuariosCtrl::class, 'formularioUsuario']);
Route::any('/modificar/usuario/{id}', [UsuariosCtrl::class, 'formularioUsuario'])->where('id', '[0-9]+');
Route::any('/borrar/usuario/{id}', [UsuariosCtrl::class, 'borrarUsuario'])->where('id', '[0-9]+');

