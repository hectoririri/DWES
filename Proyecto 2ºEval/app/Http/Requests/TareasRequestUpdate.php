<?php

namespace App\Http\Requests;

use App\Models\Clientes;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TareasRequestUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Solo los usuarios autenticados pueden crear tareas
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Importar la variable $reglas desde TareasRequest.php
        $reglas = require_once(__DIR__ . '/TareasRequest.php');
        $reglas['nif_cif_registrado'] = ['required', 'string', 'size:9', new DniNifValidationRule];
        $reglas['telefono_registrado'] = ['required', 'string', 'size:16', new TelefonoValidationRule];

        // Validar si el NIF/CIF y el teléfono existen en la base de datos
        $reglas['nif_cif_registrado'][] = function ($attribute, $value, $fail) {
            if (!Clientes::where('cif', $value)->exists()) {
            $fail('El NIF/CIF no está registrado en la base de datos.');
            }
        };

        $reglas['telefono_registrado'][] = function ($attribute, $value, $fail) {
            if (!Clientes::where('telefono', $value)->exists()) {
            $fail('El teléfono no está registrado en la base de datos.');
            }
        };
        return $reglas;
    }

    public function messages()
    {
        return [];
    }
}

