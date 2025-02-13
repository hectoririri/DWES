<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// API
Route::get('/monedas', function(){
   $monedas = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies.json');
   //dd($monedas);
   return $monedas['eur'];
});

// PDF
// https://www.nigmacode.com/laravel/generar-pdf-dompdf-laravel

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

// Rutas de clientes a parte de las CRUD
Route::get('clientes/confirmar_eliminar/{cliente}', [ClientesCtrl::class, 'confirmarEliminarCliente'])
    ->where('cliente', '[0-9]+')
    ->name('confirmar.eliminar.cliente');

// Los resources CRUD para cada controlador 
Route::resources([
    'tareas' => TareasCtrl::class,
    'usuarios' => UsuariosCtrl::class,
    'clientes' => ClientesCtrl::class,
    'cuotas' => CuotaCtrl::class
]);

// Rutas de autorización
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
