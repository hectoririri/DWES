<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// https://laravel.com/docs/11.x/controllers#restful-localizing-resource-uris

// Rutas de tareas a parte de las CRUD
Route::get('/tareas/pendientes', [TareasCtrl::class, 'mostrarTareasPendientes'])
->name('tareas.pendientes');

Route::get('/tareas/sin_operario', [TareasCtrl::class, 'mostrarTareasSinOperario'])
->name('tareas.sin_operario');

Route::get('/tareas/confirmar_eliminar/{tarea}', [TareasCtrl::class, 'confirmarBorrarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('confirmar.eliminar.tarea');

Route::get('/tareas/completar/{tarea}', [TareasCtrl::class, 'completarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('completar.tarea');
    
Route::patch('tareas/completar/{tarea}', [TareasCtrl::class, 'confirmarTarea'])
    ->where('tarea', '[0-9]+')
    ->name('confirmar.tarea');

// Rutas de usuarios a parte de las CRUD
Route::get('usuarios/confirmar_eliminar/{usuario}', [UsuariosCtrl::class, 'confirmarBorrarUsuario'])
    ->where('usuario', '[0-9]+')
    ->name('confirmar.eliminar.usuario');

// Los resources CRUD para cada controlador 
Route::resources([
    'tareas' => TareasCtrl::class,
    'usuarios' => UsuariosCtrl::class,
]);

// Rutas de autorización
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
