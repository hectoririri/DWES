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
     * Muestra la vista con todos los clientes
     *
     * @return void
     */
    public function index()
    {
        $clientes = Cliente::getClientes();
        return view('clientes.mostrar_clientes', compact('clientes'));
    }

    /**
     * Muestra la vista para crear un nuevo cliente
     *
     * @return void
     */
    public function create()
    {
        $cliente = new Cliente();
        $paises = Pais::getPaises();
        return view('clientes.form_crear_cliente', compact('cliente', 'paises'));
    }

    /**
     * Guarda un nuevo cliente en la base de datos
     *
     * @param ClienteRequest $request
     * @return void
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
     * Muestra la vista de un cliente
     *
     * @param Cliente $cliente
     * @return void
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.mostrar_cliente', compact('cliente'));
    }

    /**
     * Muestra la vista para actualizar un cliente
     *
     * @param Cliente $cliente
     * @return void
     */
    public function edit(Cliente $cliente)
    {
        $paises = Pais::getPaises();
        return view('clientes.form_actualizar_cliente', compact('cliente', 'paises'));
    }

   /**
    * Actualiza un cliente en la base de datos
    *
    * @param ClienteRequest $request
    * @param Cliente $cliente
    * @return void
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
     * Elimina un cliente de la base de datos
     *
     * @param Cliente $cliente
     * @return void
     */
    public function destroy(Cliente $cliente)
    {
        $nombre = $cliente->nombre;
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente '.$nombre.' eliminada correctamente');
    }

    /**
     * Muestra la pantalla de confirmación de eliminación de un cliente
     *
     * @param Cliente $cliente
     * @return void
     */
    public function confirmarEliminarCliente(Cliente $cliente)
    {
        return view('clientes.borrar_cliente', compact('cliente'));

    }
}
