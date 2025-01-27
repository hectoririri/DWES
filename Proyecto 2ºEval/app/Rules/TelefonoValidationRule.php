<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TelefonoValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Definimos el patrón para el formato "+XX-123-45-67-89"
        $patron = '/^\+\d{1,3}[- ]?\d{3}[- ]?\d{2}[- ]?\d{2}[- ]?\d{2}$/';
        // Verificamos si el número coincide con el patrón
        if (!preg_match($patron, $value)) {
            $fail('El formato del número es incorreto. Este debe ser "+34-123-45-67-89"'); 
        }
    }
}
