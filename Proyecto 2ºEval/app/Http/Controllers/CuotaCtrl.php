<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaCtrl extends Controller
{
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
     * Display the specified resource.
     */
    public function show(Cuota $cuota)
    {
        return view('cuotas.mostrar_cuota', compact('cuota'));
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
    public function destroy(Cuota $cuota)
    {
        if ($cuota) {
            $cuota->delete();
            return redirect()->route('cuotas.index')->with('success', 'Cuota deleted successfully');
        }
        return redirect()->route('cuotas.index')->with('error', 'Cuota not found');
    }
}
