<?php
namespace App\Models;

use Illuminate\Support\Facades\Http;

class Cambio {
    private static $instance;
    private $monedas = null;
    private $error = null;
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    private function __construct() {
        // Llamada para recoger api
        $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/eur.json');

        if ($response->successful()) {
            $this->monedas = $response->json();
        }
        if ($response->failed()) {
            $this->error = "Error al acceder a la API de conversión de moneda.";
        }
    }
    
    public function hayError() {
        // Devuelve lo contrario para entender la semántica
        // no esta vacio -> hayError = true
        return !is_null($this->error);
    }
    
    public function getError() {
        return $this->error;
    }

    function conversion($euros, $moneda_cliente){
        if ($this->hayError()) {
            return null;
        }

        // Access the exchange rates from the 'eur' key
        $monedas = $this->monedas['eur'];
        
        // Check if the requested currency exists
        if (!isset($monedas[strtolower($moneda_cliente)])) {
            $this->error = "Moneda no encontrada: " . $moneda_cliente;
            return null;
        }
        if (strtolower($moneda_cliente) == 'eur'){
            return $euros;
        }
        
        // Get the exchange rate for the specific currency
        $valor_moneda_cliente = $monedas[strtolower($moneda_cliente)];
        
        // Calculate and round the conversion
        $conversion = round(($euros * $valor_moneda_cliente), 2);
        return $conversion;
    }
}
?>