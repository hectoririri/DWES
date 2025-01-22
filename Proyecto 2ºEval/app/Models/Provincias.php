<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    protected $table = "provincias";
    protected $primaryKey = "cod";
    public $timestamps = false;
    public $incrementing = false;

    /**
     * Constructor vacío
     */
    public function __construct()
    {
    }

    /**
     * Devuelve todas las provincias con sus códigos
     *
     * @return collection
     */
    public function getProvincias()
    {
        $provincias = Provincias::all();
        return $provincias;
    }
}
