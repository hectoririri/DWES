<?php

namespace App\Http\Requests;

use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;

$reglas = [
    'nif_cif' => ['required', 'string', 'size:9', new DniNifValidationRule],
    'nombre' => ['required', 'string', 'max:40'],
    'apellidos' => ['required', 'string', 'max:60'],
    'telefono' => ['required', 'string', 'size:16', new TelefonoValidationRule],
    'descripcion' => ['required', 'string', 'max:500'],
    // 'correo' => ['required', 'email', 'max:100', 'exists:usuarios,correo'], //unique:usuarios: el correo debe ser único en la tabla usuarios preguntar
    // 'direccion' => ['string', 'max:100'],
    // 'poblacion' => ['string', 'max:100'],
    // 'cod_postal' => ['required', 'integer', 'max:5'],
    // 'provincia' => ['required', 'string', 'exists:provincias,nombre', 'max:50'],
    // 'estado' => ['required', 'string', 'size:1', 'in:P,B,R,C,A'],
    // 'operario' => ['required', 'int', 'max:11', 'exists:usuarios,id'],
    // 'fecha_realizacion' => ['required', 'date', 'after:fecha_creacion'],
    'anotaciones_anteriores' => ['string', 'max:500'],
    'anotaciones_posteriores' => ['string', 'max:500'],
    // ficheros
];

return $reglas;
