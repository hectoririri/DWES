<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tarea;

class Provincia extends Model
{
    protected $table = "provincias";
    protected $primaryKey = "cod";
    public $timestamps = false;
    public $incrementing = false;

    /**
     * Declaramos la relación uno a muchos con la tabla tareas
     *
     * @return void
     */
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'provincia', 'cod');
    }

    /**
     * Devuelve todas las provincias con sus códigos
     *
     * @return collection
     */
    public static function getProvincias()
    {
        $provincias = self::all();
        return $provincias;
    }
}
