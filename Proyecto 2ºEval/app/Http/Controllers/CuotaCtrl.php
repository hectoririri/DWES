<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuotaRequest;
use App\Models\Cliente;
use App\Models\Cuota;
use App\Models\Remesa;
use Pdf;
class CuotaCtrl extends Controller
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
        $cuotas = Cuota::getCuotas();
        return view('cuotas.mostrar_cuotas', compact('cuotas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuota = new Cuota();
        $clientes = Cliente::all();
        return view('cuotas.form_crear_cuota', compact('cuota', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuotaRequest $request)
    {
        // Validamos el formulario y lo guardamos en $validado
        $validado = $request->validated();

        // Creamos la nueva cuota con los datos validados del formulario
        $cuota = Cuota::create($validado);

        // Redigirimos a la vista de la nueva cuota que hemos creado
        return redirect()->route('cuotas.show', $cuota)
            ->with('success', 'Cuota creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuota $cuota)
    {
        return view('cuotas.mostrar_cuota', compact('cuota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuota $cuota)
    {
        $clientes = Cliente::all();
        return view('cuotas.form_editar_cuota', compact('cuota', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuotaRequest $request, Cuota $cuota)
    {
        // Validamos el formulario y lo guardamos en $validado
        $validado = $request->validated();

        // Actualizamos la cuota con los datos validados del formulario
        $cuota->update($validado);

        // Redigirimos a la vista de la cuota actualizada 
        return redirect()->route('cuotas.show', $cuota)
            ->with('success', 'Cuota actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuota $cuota)
    {
        if ($cuota) {
            $cuota->delete();
            return redirect()->route('cuotas.index')->with('success', 'Cuota eliminada correctamente');
        }
        return redirect()->route('cuotas.index')->with('error', 'Cuota no encontrada');
    }

    /**
     * Crea el pdf con el contenido de la cuota
     *
     * @param Cuota $cuota
     * @return void
     */
    public function crearPdf(Cuota $cuota){

        // Instancia de domPDF cargando la vista blade del pdf
        $pdf = Pdf::loadView('cuotas.pdf_cuota', compact('cuota'));
        
        // Tamaño de la hoja
        $pdf->setPaper('a4');
        
        // Descargamos el pdf con el id y concepto de la cuota
        return $pdf->download('cuota_' . $cuota->id . '' . $cuota->concepto . '.pdf');
    }

    public function mostrarCuotasCliente(Cliente $cliente){
        $cuotas = $cliente->cuotas()->paginate(5);
        return view('cuotas.mostrar_cuotas', compact('cuotas'));
    }

    public function mostrarCuotasRemesa(Remesa $remesa){
        $cuotas = Cuota::where('concepto', $remesa->motivo)->paginate(5);
        return view('cuotas.mostrar_cuotas', compact('cuotas'));
    }
}
