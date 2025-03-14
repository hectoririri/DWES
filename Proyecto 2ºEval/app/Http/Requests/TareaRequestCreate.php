<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Usuario;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Closure;
use Illuminate\Foundation\Http\FormRequest;

class TareaRequestCreate extends FormRequest
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
            'telefono_contacto' => ['required','string','size:16', new TelefonoValidationRule],
            'persona_contacto' => ['required','string','max:100'],
            'correo_contacto' => ['required', 'string', 'max:255', 'email:rfc,dns'],
            'descripcion' => ['required', 'string', 'max:500'],
            'direccion' => ['nullable', 'string', 'max:100'],
            'poblacion' => ['nullable', 'string', 'max:100'],
            'cod_postal' => ['required', 'digits:5'],
            'provincia' => ['required', 'string', 'exists:provincias,cod', 'max:1000'],
            'estado' => ['required', 'string', 'size:1', 'in:P,B,R,C'],
            'fecha_creacion' => ['required', 'date'],
            'fecha_realizacion' => ['required', 'date', 'after:fecha_creacion'],
            'anotaciones_anteriores' => ['nullable', 'string', 'max:500'],
            'anotaciones_posteriores' => ['nullable', 'string', 'max:500'],
        ];

        if (User::isAdmin()) {
            $reglas['operario_id'] = ['required', 'integer', 'exists:users,id'];
            $reglas['cliente_id'] = ['required', 'integer', 'exists:clientes,id'];
        } else {
            $reglas['nif_cif'] = [
                'required',
                'string',
                'size:9',
                new DniNifValidationRule,
                function (string $attribute, mixed $value, \Closure $fail) {
                    $nif = request()->input('nif_cif');
                    $telefono = request()->input('telefono');

                    if (!Cliente::isClienteRegistered($telefono, $nif)) {
                        $fail('El cliente con este NIF/CIF y teléfono no está registrado en el sistema.');
                    }
                }
            ];
            $reglas['telefono'] = ['required', 'string', 'size:16', new TelefonoValidationRule];
        }

        return $reglas;
    }


    public function messages()
    {
        return [];
    }
}
