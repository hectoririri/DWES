<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuariosCtrl extends Controller
{
    private $usuarios;

    /**
     * Constructor. Instancia los modelos necesarios.
     */
    public function __construct()
    {
        $this->usuarios = new Usuarios();
    }
    /**
     * Muestra todos los usuarios de la base de datos.
     *
     * @return void
     */
    public function index()
    {
        $usuarios = $this->usuarios->getUsuarios();
        return view('usuarios.mostrar_usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Muestra los detalles del usuario seleccionado.
     * @param int $id, id del usuario
     */
    public function show(int $id)
    {
        $usuario = $this->usuarios->getUsuario($id);
        return view('mostrar_usuario', compact('usuario'));
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
    public function confirmarBorrarUsuario(int $id){
        $usuario = $this->usuarios->getUsuario($id);
        return view('confirmar_borrar_usuario', compact('usuario'));
    }
}
