<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $cliente = request()->route('cliente');
        $isCreating = $this->route()->getName() == 'clientes.store';
        return [
            'cif' => [
                'required',
                'string',
                'size:9',
                new DniNifValidationRule,
                $isCreating ? 'unique:clientes,cif' : Rule::unique('clientes', 'cif')->ignore($cliente)
            ],
            'nombre' => ['required', 'string', 'max:50'],
            'telefono' => ['required', 'string', 'size:16', new TelefonoValidationRule,
            $isCreating ? 'unique:clientes,telefono' : Rule::unique('clientes', 'telefono')->ignore($cliente)
            ],
            'correo' => ['required', 'string', 'max:255', 'email:rfc,dns', 
            $isCreating ? 'unique:clientes,correo' : Rule::unique('clientes', 'correo')->ignore($cliente)
            ],
            // porque falla?? 'exists:paises,nombre'
            'pais' => ['required', 'string', 'max:100'],
            'cuenta_corriente' => ['required', 'string', 'size:24',
            $isCreating ? 'unique:clientes,cuenta_corriente' : Rule::unique('clientes', 'cuenta_corriente')->ignore($cliente)
            ],
            'moneda' => ['required', 'string', 'size:3', 'exists:paises,iso_moneda'],
            'importe_mensual' => ['required', 'numeric', 'between:0,9999.99', 'decimal:0,2'],
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
