<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $cuota = request()->route('cuota');
        $isCreating = $this->route()->getName() == 'cuotas.store';
        $reglas = [
            'concepto' => ['required', 'string', 'max:150'],
            'fecha_emision' => ['required', 'date'],
            'importe' => ['required', 'numeric', 'decimal:0,2'],
            'notas' => ['nullable', 'string', 'max:150'],
            'cliente_id' => ['required','integer','exists:clientes,id'],
        ];
        if (!$isCreating) {
            $reglas['fecha_pago'] = ['required', 'date', 'after_or_equal:'. $cuota->fecha_emision];
        }
        return $reglas;
    }

    public function messages()
    {
        return [
            
        ];
    }
}
