<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\Pais;
use Illuminate\Http\Request;

class ClientesCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('roles:A');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::getClientes();
        return view('clientes.mostrar_clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente();
        $paises = Pais::getPaises();
        return view('clientes.form_crear_cliente', compact('cliente', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        // Validamos el formulario y lo guardamos en $validado
        $validado = $request->validated();

        // Creamos el nuevo cliente con los datos validados del formulario
        $cliente = Cliente::create($validado);

        // Redigirimos a la vista del nuevo cliente que hemos creado
        return redirect()->route('clientes.show', $cliente)
            ->with('success', 'Tarea creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.mostrar_cliente', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $paises = Pais::getPaises();
        return view('clientes.form_actualizar_cliente', compact('cliente', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        // Validamos el formulario y lo guardamos en $validado
        $validado = $request->validated();

        // Actualizamos el cliente con el formulario validado
        $cliente->update($validado);

        // Redigirimos a la vista del nuevo cliente que hemos actualizado
        return redirect()->route('clientes.show', $cliente)
        ->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $nombre = $cliente->nombre;
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente '.$nombre.' eliminada correctamente');
    }

    public function confirmarEliminarCliente(Cliente $cliente)
    {
        return view('clientes.borrar_cliente', compact('cliente'));

    }
}
