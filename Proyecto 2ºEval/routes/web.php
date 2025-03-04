<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Rutas home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


// RUTAS DE TAREAS a parte de las CRUD
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

// RUTAS DE USUARIO a parte de las CRUD
Route::get('usuarios/confirmar_eliminar/{usuario}', [UsuariosCtrl::class, 'confirmarBorrarUsuario'])
    ->where('usuario', '[0-9]+')
    ->name('confirmar.eliminar.usuario');


// RUTAS DE CLIENTES a parte de las CRUD
Route::get('clientes/confirmar_eliminar/{cliente}', [ClientesCtrl::class, 'confirmarEliminarCliente'])
    ->where('cliente', '[0-9]+')
    ->name('confirmar.eliminar.cliente');

// RUTA DE CUOTAS a parte de las CRUD
Route::get('/cuotas/{cuota}/pdf', [CuotaCtrl::class, 'crearPdf'])->name('cuotas.pdf');
// ruta para formulario remesa



// Los resources CRUD para cada controlador 
Route::resources([
    'tareas' => TareasCtrl::class,
    'usuarios' => UsuariosCtrl::class,
    'clientes' => ClientesCtrl::class,
    'cuotas' => CuotaCtrl::class,
    'remesas' => RemesaCtrl::class
]);


// Rutas de autorización
Auth::routes();
