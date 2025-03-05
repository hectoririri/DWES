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
     * Muestra la vista con todas las cuotas
     *
     * @return void
     */
    public function index()
    {
        $cuotas = Cuota::getCuotas();
        return view('cuotas.mostrar_cuotas', compact('cuotas'));

    }

    /**
     * Muestra la vista para crear una nueva cuota
     *
     * @return void
     */
    public function create()
    {
        $cuota = new Cuota();
        $clientes = Cliente::all();
        return view('cuotas.form_crear_cuota', compact('cuota', 'clientes'));
    }

    /**
     * Guarda una nueva cuota en la base de datos
     *
     * @param CuotaRequest $request
     * @return void
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
     * Muestra la vista de una cuota
     *
     * @param Cuota $cuota
     * @return void
     */
    public function show(Cuota $cuota)
    {
        return view('cuotas.mostrar_cuota', compact('cuota'));
    }

    /**
     * Muestra la vista para actualizar una cuota
     *
     * @param Cuota $cuota
     * @return void
     */
    public function edit(Cuota $cuota)
    {
        $clientes = Cliente::all();
        return view('cuotas.form_editar_cuota', compact('cuota', 'clientes'));
    }

    /**
     * Actualiza una cuota en la base de datos
     *
     * @param CuotaRequest $request
     * @param Cuota $cuota
     * @return void
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
     * Elimina una cuota de la base de datos
     *
     * @param Cuota $cuota
     * @return void
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

    /**
     * Muestra las cuotas de un cliente
     *
     * @param Cliente $cliente
     * @return void
     */
    public function mostrarCuotasCliente(Cliente $cliente){
        $cuotas = $cliente->cuotas()->paginate(5);
        return view('cuotas.mostrar_cuotas', compact('cuotas'));
    }

    /**
     * Muestra las cuotas de una remesa
     *
     * @param Remesa $remesa
     * @return void
     */
    public function mostrarCuotasRemesa(Remesa $remesa){
        $cuotas = Cuota::where('concepto', $remesa->motivo)->paginate(5);
        return view('cuotas.mostrar_cuotas', compact('cuotas'));
    }
}
