<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariosCtrl extends Controller
{
    public function __construct()
    {
        // Aplicar el middleware 'roles:A' a todas las acciones EXCEPTO 'edit' y 'update'
        $this->middleware('roles:A')->except(['edit', 'update', 'show']);

        // Permitir acceso a 'edit' y 'update' para roles 'A' y 'O'
        $this->middleware('roles:A,O')->only('edit', 'update', 'show');
    }

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
    public function show(Usuario $usuario)
    {
        if (Auth::user()->isOperario() && Auth::user()->id != $usuario->id){
            $usuario = Auth::user();
        } 
        return view('usuarios.mostrar_usuario', compact('usuario'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario) {
        if (Auth::user()->isOperario() && Auth::user()->id != $usuario->id){
            $usuario = Auth::user();
            return redirect()->route('usuarios.edit', compact('usuario'));
        }
        else
            return view('usuarios.form_editar_usuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $validated = $request->validated();
        if (Auth::user()->isAdmin()){
            // Enctriptamos la contraseña antes de guardarla
            $validated['password'] = Hash::make($validated['password']);
        }
        $usuario->update($validated);
        if (Auth::user()->isAdmin()){
            return redirect()->route('usuarios.show', compact('usuario'))->with('mensaje', 'Usuario'. $usuario->name .'actualizado correctamente');
        } else {
            return redirect()->route('usuarios.show', compact('usuario'))->with('mensaje', 'Usuario'. $usuario->name .'actualizado correctamente');
        }
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
