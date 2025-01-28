<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";
    protected $primaryKey = "id";
    const CREATED_AT = 'fecha_alta';
    const UPDATED_AT = 'fecha_actualizado';


    /**
     * Declaramos la relación uno a muchos con la tabla tareas
     *
     * @return void
     */
    public function tareas()
    {
        return $this->hasMany(Tareas::class);
    }
    
    /**
     * Declaramos la relación uno a muchos con la tabla cuotas
     *
     * @return void
     */
    public function cuotas()
    {
        return $this->hasMany(Cuotas::class);
    }

    /**
     * Constructor vacío
     */
    public function __construct()
    {
    }

    public function isClienteRegistered(string $tel, string $nif_cif){
        return $this->where('telefono', $tel)->where('cif', $nif_cif)->exists();
    }
}
