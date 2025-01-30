<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosCtrl extends Controller
{
    
    /**
     * Muestra todos los usuarios de la base de datos.
     *
     * @return void
     */
    public function index()
    {
        $usuarios = Usuario::getUsuarios();
        return view('usuarios.mostrar_usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.form_crear_usuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            // campos a comprobar
        ]);
        $usuario = Usuario::create($validated);
        return redirect()->route('usuarios.show', $usuario);
    }

    /**
     * Muestra los detalles del usuario seleccionado.
     * @param int $id, id del usuario
     */
    public function show(int $id)
    {
        $usuario = Usuario::getUsuario($id);
        return view('usuarios.mostrar_usuario', compact('usuario'));
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
     * Muestra una vista para confirmar el borrado de un usuario
     *
     * @param integer $id id del usuario a borrar
     * @return void
     */
    public function confirmarBorrarUsuario(Usuario $usuario){
        return view('usuarios.borrar_usuario', compact('usuario'));
    }
}
