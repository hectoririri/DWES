<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasRequestCtrl extends FormRequest
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
        $reglas = [
            'nif_cif' => ['required', 'string', 'max:9'],
            'nombre' => ['required', 'string', 'max:40'],
            'apellidos' => ['required', 'string', 'max:60'],
            'telefono' => ['required', 'string', 'max:16'],
            'descripcion' => ['required', 'string', 'max:500'],
            'correo' => ['required', 'email', 'max:100', 'unique:usuarios,correo'], //unique:usuarios: el correo debe ser único en la tabla usuarios preguntar
            'direccion' => ['string', 'max:100'],
            'poblacion' => ['string', 'max:100'],
            'cod_postal' => ['required', 'integer', 'max:5'],
            'provincia' => ['required', 'string', 'exists:provincias,nombre', 'max:50'],
            'estado' => ['required', 'string', 'max:1', 'in:P,B,R,C,A'],
            'operario' => ['required', 'int', 'max:11', 'exists:usuarios,id'],
            'id_usuario' => ['required', 'integer', 'max:11', 'exists:usuarios,id'],
            'fecha_realizacion' => ['required', 'date', 'after:fecha_creacion_date'],
            'anotaciones_anteriores' => ['string', 'max:500'],
            'anotaciones_posteriores' => ['string', 'max:500'],
            // ficheros
        ];
        return $reglas;
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

