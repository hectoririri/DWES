<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

include 'helpers.php';

Route::get('/', function () {
    return view('home')->with('mostrarMenu', true);
});

Route::get('/tareas/pendientes', [TareasCtrl::class, 'mostrarTareasPendientes'])
    ->name('tareas.pendientes');

Route::get('/tareas/confirmar_eliminar/{tarea}', [TareasCtrl::class, 'confirmarBorrarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('confirmar.eliminar.tarea');

Route::get('/tareas/completar/{tarea}', [TareasCtrl::class, 'completarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('completar.tarea');

Route::get('usuarios/confirmar_eliminar/{usuario}', [UsuariosCtrl::class, 'confirmarBorrarUsuario'])
    ->where('usuario', '[0-9]+')
    ->name('confirmar.eliminar.usuario');

Route::resources([
    'tareas' => TareasCtrl::class,
    'usuarios' => UsuariosCtrl::class,
]);