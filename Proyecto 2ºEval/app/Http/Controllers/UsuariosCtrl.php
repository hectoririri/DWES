<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Support\Facades\Hash;

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
        $usuario = new Usuario();
        return view('usuarios.form_crear_usuario', compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        
        $validated = $request->validated();
         // Enctriptamos la contraseña antes de guardarla
        $validated['password'] = Hash::make($validated['password']);
        $usuario = Usuario::create($validated);
        return redirect()->route('usuarios.show', $usuario)->with('mensaje', 'Usuario '.$usuario->name.' creado correctamente');
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
    public function edit(Usuario $usuario)
    {
        return view('usuarios.form_editar_usuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $validated = $request->validated();
        $usuario->update($validated);
        return redirect()->route('usuario.show', compact('usuario'))->with('mensaje', 'Usuario'. $usuario->name .'actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('mensaje', 'Usuario eliminado correctamente');
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
