<?php

namespace App\Http\Requests;

use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Validation\Rule;

$reglas = [
    // 'nif_cif' => ['required', 'string', 'size:9', new DniNifValidationRule],
    'nombre' => ['required', 'string', 'max:40'],
    // 'apellidos' => ['required', 'string', 'max:60'],
    // 'telefono' => ['required', 'string', 'size:16', new TelefonoValidationRule],
    'descripcion' => ['required', 'string', 'max:500'],
    // 'correo' => ['required', 'email', 'max:100', 'exists:usuarios,correo'], //unique:usuarios: el correo debe ser único en la tabla usuarios preguntar
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
    'telefono_registrado' => ['required', 'string', 'size:16', new TelefonoValidationRule],
    'nif_cif_registrado' => ['required', 'string', 'size:9', new DniNifValidationRule],
    // preguntar porque el validate se ejeuta primero
    // ficheros
];

return $reglas;
