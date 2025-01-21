<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

include 'helpers.php';

Route::get('/', function () {
    return view('home')->with('mostrarMenu', true);
});

// Rutas de tareas
// Route::any('/formulario/alta/tarea', [TareasCtrl::class, 'formularioTarea']);
// Route::any('/modificar/tarea/{id}', [TareasCtrl::class, 'formularioTarea'])->where('id', '[0-9]+');
// Route::any('/completar/tarea/{id}', [TareasCtrl::class, 'completarTarea'])->where('id', '[0-9]+');

Route::get('/mostrar/tarea/{id}', [TareasCtrlR::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('mostrar_tarea');

Route::get('/mostrar/tareas', [TareasCtrlR::class, 'index'])
    ->where('id', '[0-9]+')
    ->name('mostrar_tareas');

Route::get('/mostrar/tareas/pendientes', [TareasCtrlR::class, 'mostrarTareasPendientes'])
    ->where('id', '[0-9]+')
    ->name('mostrar_tareas_pendientes');

Route::get('/confirmar_eliminar/tarea/{id}', [TareasCtrlR::class, 'confirmarBorrarTarea'])
    ->where('id', '[0-9]+')
    ->name('confirmar_eliminar_tarea');
// Rutas de usuarios
Route::get('/mostrar/usuarios', [UsuariosCtrlR::class, 'index'])
    ->where('id', '[0-9]+')
    ->name('mostrar_usuarios');

Route::get('/mostrar/usuario/{id}', [UsuariosCtrlR::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('mostrar_usuario');
    
Route::get('/confirmar_eliminar/usuario/{id}', [UsuariosCtrlR::class, 'confirmarBorrarUsuario'])
    ->where('id', '[0-9]+')
    ->name('confirmar_eliminar_usuario');
// Route::any('/formulario/alta/usuario', [UsuariosCtrl::class, 'formularioUsuario']);
// Route::any('/modificar/usuario/{id}', [UsuariosCtrl::class, 'formularioUsuario'])->where('id', '[0-9]+');
