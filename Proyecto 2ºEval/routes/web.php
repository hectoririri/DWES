<?php
/*
Las rutas se asocian a un controlador y a un método del controlador.
En el metodo del controloador se procesa la petición y se devuelve la respuesta.
Dentro de esa petición, se reciben los datos del modelo y se envían a la vista.
En esa vista se trabajan los datos y se muestran, mediante el controlador, al usuario utilizando el return view().
*/
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

include 'helpers.php';
// Rutas de login y home
Route::get('/pruebaTareas', [TareasCtrlR::class, 'index']);
Route::any('/home', function () {
    return view('home')->with('mostrarMenu', true);
});

// Rutas de tareas
Route::any('/formulario/alta/tarea', [TareasCtrl::class, 'formularioTarea']);
Route::any('/modificar/tarea/{id}', [TareasCtrl::class, 'formularioTarea'])->where('id', '[0-9]+');
Route::any('/completar/tarea/{id}', [TareasCtrl::class, 'completarTarea'])->where('id', '[0-9]+');

Route::any('/mostrar/tarea/{id}', [TareasCtrl::class, 'mostrarTarea'])->where('id', '[0-9]+');
Route::any('/mostrar/tareas', [TareasCtrl::class, 'mostrarTareas']);
Route::any('/mostrar/tareas/pendientes', [TareasCtrl::class, 'mostrarTareasPendientes']);

Route::any('/borrar/tarea/{id}', [TareasCtrl::class, 'borrarTarea'])->where('id', '[0-9]+');

// Rutas de usuarios
Route::any('/mostrar/usuarios', [UsuariosCtrl::class, 'mostrarUsuarios']);
Route::any('/mostrar/usuario/{id}', [UsuariosCtrl::class, 'mostrarUsuario'])->where('id', '[0-9]+');

Route::any('/formulario/alta/usuario', [UsuariosCtrl::class, 'formularioUsuario']);
Route::any('/modificar/usuario/{id}', [UsuariosCtrl::class, 'formularioUsuario'])->where('id', '[0-9]+');
Route::any('/borrar/usuario/{id}', [UsuariosCtrl::class, 'borrarUsuario'])->where('id', '[0-9]+');

