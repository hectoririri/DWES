<?php

namespace App\Http\Requests;

use App\Models\Clientes;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Closure;
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
        /*
        $reglas['nif_cif'] = ['required', 'string', 'size:9', new DniNifValidationRule,
            function (string $attribute, mixed $value, Closure $fail) {
                $nif = request()->input('nif_cif_registrado');
                $telefono = request()->input('telefono_registrado');
                if (!Clientes::isClienteRegistered($telefono, $nif)) {
                    // Añadimos error en caso de que no esté registrado
                    $fail('El cliente con este NIF/CIF y teléfono no está registrado en el sistema');
                }
            }
        ];
        */
        return $reglas;
    }

    /**
     * Función que realiza una validación adicional al validar las primeras reglas
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        /*
        // Indicamos que vamos a realizar otra validación después de terminar con la primera
        $validator->after(function ($validator) {
            // Instanciamos el modelo clientes y sacamos las variables del formulario
            
            $nif = $this->input('nif_cif_registrado');
            $telefono = $this->input('telefono_registrado');
            if (!Clientes::isClienteRegistered($telefono, $nif)) {
                // Añadimos error en caso de que no esté registrado
                $validator->errors()->add('nif_cif_registrado', 'El cliente con este NIF/CIF y teléfono no está registrado en el sistema'
                );
            }
        });
        */
    }

    public function messages()
    {
        return [];
    }
}

