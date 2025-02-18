<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    protected $table = "paises";
    protected $primaryKey = "id";
    public $timestamp = false;

    /**
     * Declaramos la relación un Pais muchos Clientes 
     *
     * @return HasMany
     */
    public function Cliente():HasMany
    {
        return $this->hasMany(Cliente::class, 'pais', 'id');
    }

    /**
     * Colección que devuelve todos los paises
     *
     * @return Collection
     */
    public static function getPaises(): Collection
    {
        $paises = self::all();
        return $paises;
    }
}
