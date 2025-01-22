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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:40'],
            'apellidos' => ['required', 'string', 'max:60'],
            'telefono' => ['required', 'string', 'max:16'],
            'descripcion' => ['required', 'string', 'max:500'],
            'correo' => ['required', 'email', 'max:100', 'unique:usuarios'], //unique:usuarios: el correo debe ser único en la tabla usuarios
            'direccion' => ['required', 'string', 'max:100'],
            'poblacion' => ['required', 'string', 'max:100'],
            

        ];
    }
}
