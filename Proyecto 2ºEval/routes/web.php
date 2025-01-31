<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

include 'helpers.php';

// https://laravel.com/docs/11.x/controllers#restful-localizing-resource-uris



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

Route::patch('tareas/completar/{tarea}', [TareasCtrl::class, 'confirmarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('confirmar.tarea');

// Los resources CRUD para cada controlador
Route::resources([
    'tareas' => TareasCtrl::class,
    'usuarios' => UsuariosCtrl::class,
]);

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
