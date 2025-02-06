<?php

namespace App\Http\Requests;

use App\Models\Clientes;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TareaRequestUpdate extends FormRequest
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
        $reglas = [
            'descripcion' => ['required', 'string', 'max:500'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'poblacion' => ['nullable', 'string', 'max:100'],
            'cod_postal' => ['required', 'integer', 'max:99999'],
            'provincia' => ['required', 'string', 'exists:provincias,nombre', 'max:50'],
            'estado' => ['required', 'string', 'size:1', 'in:P,B,R,C,A'],
            'operario_id' => ['required', 'integer', 'exists:users,id'],
            'cliente_id' => ['required', 'integer', 'exists:clientes,id'],
            'fecha_creacion' => ['required', 'date_format:Y-m-d\\TH:i'],
            'fecha_realizacion' => ['required', 'date_format:Y-m-d\\TH:i', 'after:fecha_creacion'],
            'anotaciones_anteriores' => ['nullable', 'string', 'max:500'],
            'anotaciones_posteriores' => ['nullable', 'string', 'max:500'],
            // ficheros solo en administrador
        ];
        return $reglas;
    }

    public function messages()
    {
        return [];
    }
}
