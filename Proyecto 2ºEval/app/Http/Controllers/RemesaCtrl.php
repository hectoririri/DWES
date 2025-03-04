<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cuota;
use App\Models\Remesa;
use Illuminate\Http\Request;

class RemesaCtrl extends Controller
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
        $remesas = Remesa::paginate(5);
        return view('remesas.mostrar_remesas', compact('remesas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('remesas.form_crear_remesa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los campos del formulario directamente aquí
        $validado = $request->validate([
            'fecha' => 'required|date|after:today',
            'motivo' => 'nullable|string|max:255',
        ]);
        // Si la validación es exitosa, guardamos la remesa en la base de datos
        Remesa::create($validado);

        $clientes = Cliente::all();
        // Ahora creamos para cada cliente una cuota con los datos de esa remesa
        foreach ($clientes as $cliente) {
            $cuota = new Cuota();
            $cuota->concepto = $validado['motivo'];
            $cuota->fecha_emision = $validado['fecha'];
            $cuota->importe = $cliente['importe_mensual'];
            $cuota->fecha_pago = null;
            $cuota->notas = null;
            $cuota->cliente_id = $cliente['id'];
            $cuota->save();
        }

        // Redirigimos a la página de las remesas
        return redirect()->route('remesas.index')->with('success', 'Remesa creada con éxito');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
