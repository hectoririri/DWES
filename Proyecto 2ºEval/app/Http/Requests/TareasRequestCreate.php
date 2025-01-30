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
        // Si el formulario lo manda un cliente y no añadimos
        /*
        $reglas['nif_cif'] = ['required', 'string', 'size:9', new DniNifValidationRule, 
            function (string $attribute, mixed $value, \Closure $fail) {
                $nif = request()->input('nif_cif');
                $telefono = request()->input('telefono');
                if (!Clientes::isClienteRegistered($telefono, $nif)) {
                    // Añadimos error en caso de que no esté registrado
                    $fail('El cliente con este NIF/CIF y teléfono no está registrado en el sistema');
                }
            }];
        $reglas['telefono'] = ['required', 'string', 'size:16', new TelefonoValidationRule];
        */

        // Si el formulario lo manda un administrador quitariamos ambos campos de la variable reglas
        // añadimos el select de clientes
        /* $reglas['cliente_id'] = ['required', 'int', 'max:11', 'exists:clientes,id'] */

        $reglas = [
            'nif_cif' => ['required', 'string', 'size:9', new DniNifValidationRule, 
            function (string $attribute, mixed $value, \Closure $fail) {
                $nif = request()->input('nif_cif');
                $telefono = request()->input('telefono');
                if (!Clientes::isClienteRegistered($telefono, $nif)) {
                    // Añadimos error en caso de que no esté registrado
                    $fail('El cliente con este NIF/CIF y teléfono no está registrado en el sistema');
                }
            }],
            'telefono' => ['required', 'string', 'size:16', new TelefonoValidationRule],
            'descripcion' => ['required', 'string', 'max:500'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'poblacion' => ['nullable', 'string', 'max:100'],
            'cod_postal' => ['required', 'integer', 'max:99999'],
            'provincia' => ['required', 'string', 'exists:provincias,nombre', 'max:50'],
            'estado' => ['required', 'string', 'size:1', 'in:P,B,R,C,A'],
            'operario' => ['required', 'int', 'max:11', 'exists:usuarios,id'],
            'fecha_creacion' => ['required', 'date_format:Y-m-d\\TH:i'],
            'fecha_realizacion' => ['required', 'date_format:Y-m-d\\TH:i', 'after:fecha_creacion'],
            'anotaciones_anteriores' => ['nullable', 'string', 'max:500'],
            'anotaciones_posteriores' => ['nullable', 'string', 'max:500'],
        ];
        
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

