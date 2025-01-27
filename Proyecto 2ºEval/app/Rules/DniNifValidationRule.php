<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DniNifValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dni = strtoupper($value); // Convertir a mayúsculas
        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';

        // Validar formato general
        if (!preg_match('/^[A-Z0-9]{9}$/', $dni)) {
            $fail('Formato incorrecto. Deben ser 8 números y 1 letra');
        }

        // Validar NIF estándar (8 números + 1 letra)
        if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            $numero = substr($dni, 0, 8);
            $letra = substr($dni, -1);
            if ($letra !== $letras[$numero % 23]) {
                $fail('Letra incorrecta para el NIF.');
            }
        }

        // Validar NIE (X, Y, Z seguido de 7 números y una letra)
        if (preg_match('/^[XYZ][0-9]{7}[A-Z]$/', $dni)) {
            $numero = str_replace(['X', 'Y', 'Z'], ['0', '1', '2'], substr($dni, 0, 1)) . substr($dni, 1, 7);
            $letra = substr($dni, -1);
            if ($letra === $letras[$numero % 23]) {
                $fail('Letra incorrecta para el NIE.');
            };
        }

        // Validar CIF (letra + 7 números + letra/número)
        if (preg_match('/^[ABCDEFGHJNPQRSUVW][0-9]{7}[A-Z0-9]$/', $dni)) {
            $sumaPar = 0;
            $sumaImpar = 0;

            for ($i = 1; $i <= 6; $i += 2) {
                $sumaPar += (int) $dni[$i];
            }

            for ($i = 0; $i <= 6; $i += 2) {
                $doble = (int) $dni[$i] * 2;
                $sumaImpar += $doble > 9 ? $doble - 9 : $doble;
            }

            $sumaTotal = $sumaPar + $sumaImpar;
            $control = (10 - ($sumaTotal % 10)) % 10;

            $controlEsperado = substr($dni, -1);
            if (ctype_alpha($controlEsperado)) {
                if ($controlEsperado !== chr(64 + $control)) {
                    $fail('Letra de control incorrecta para el CIF.');
                }
            } else {
                if ($controlEsperado != $control) {
                    $fail('Número de control incorrecto para el CIF.');
                }
            }
        }

        // Validar NIE especial (T seguido de 8 caracteres)
        if (preg_match('/^T[0-9]{8}$/', $dni)) {
            return; // Se acepta directamente
        }
    }
}
