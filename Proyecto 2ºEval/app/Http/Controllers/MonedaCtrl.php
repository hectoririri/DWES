<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MonedaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // https://kinsta.com/es/blog/laravel-http/#cmo-hacer-peticiones
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'text/xml',
            ])->get('https://ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
            
            if ($response->successful()) {
                return $response;
            }
            
            return response()->json(['error' => 'Failed to fetch exchange rates'], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error accessing exchange rate service'], 500);
        }
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
    public function show(string $id)
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
