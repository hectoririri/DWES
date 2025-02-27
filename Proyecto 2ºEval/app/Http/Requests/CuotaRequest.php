<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CuotaRequest extends FormRequest
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
        $isCreating = $this->route()->getName() == 'cuotas.store';
        return [
            'concepto' => ['required', 'string', 'max:150'],
            'fecha_emision' => ['required', 'date'],
            'importe' => ['required', 'string', 'decimal:2'],
            'notas' => ['required', 'string', 'max:150'],
            'cliente_id' => ['required','integer','exists:clientes,id'],
            'moneda' => ['required', 'string', 'size:3', 'exists:paises,iso_moneda'],
            'importe_mensual' => ['required', 'numeric', 'between:0,9999.99'],
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
