<?php

namespace App\Http\Requests;

use App\Models\Clientes;
use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Validation\Rule;

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
    // 'direccion' => ['nullable', 'string', 'max:100'],
    // 'poblacion' => ['nullable', 'string', 'max:100'],
    // 'cod_postal' => ['required', 'integer', 'max:5'],
    'provincia' => ['required', 'string', 'exists:provincias,nombre', 'max:50'],
    'estado' => ['required', 'string', 'size:1', 'in:P,B,R,C,A'],
    'operario' => ['required', 'int', 'max:11', 'exists:usuarios,id'],
    // 'fecha_creacion' => ['required', 'date_format:Y-m-d H:i:s'],
    // 'fecha_realizacion' => ['required', 'date_format:Y-m-d H:i:s' 'after:fecha_creacion'],
    'anotaciones_anteriores' => ['nullable', 'string', 'max:500'],
    'anotaciones_posteriores' => ['nullable', 'string', 'max:500'],
    // preguntar porque el validate se ejeuta primero
    // ficheros
];

return $reglas;
