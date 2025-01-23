<?php

namespace App\Http\Requests;

use App\Models\Clientes;
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
        $reglas = require_once('/TareasRequest.php');
        $reglas['nif_cif_registrado'] = ['required', 'string', 'min:9', 'max:9'];
        $reglas['telefono_registrado'] = ['required', 'string', 'min:9', 'max:9'];
        $clientes = new Clientes();
        if ($this->validate($reglas) && $clientes->isClienteRegistered('telefono_registrado', 'nif_cif_registrado')) {
            return $reglas;
        } else {
            return [];
        }
    }

    public function messages()
    {
        return [
            'nif_cif.required' => 'El campo NIF/CIF es obligatorio.',
            'nif_cif.string' => 'El campo NIF/CIF debe ser una cadena de texto.',
            'nif_cif.max' => 'El campo NIF/CIF no puede tener más de 9 caracteres.',
        ];
    }
}

