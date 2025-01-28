<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasRequestCreate extends FormRequest
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
        return $reglas;
    }

    public function messages()
    {
        return [
            'nif_cif.size' => 'El campo NIF/CIF debe tener 9 caracteres.',
        ];
    }
}

