<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
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
        return $this->hasMany(Tarea::class);
    }
    
    /**
     * Declaramos la relación uno a muchos con la tabla cuotas
     *
     * @return void
     */
    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }

    /**
     * Constructor vacío
     */
    public function __construct()
    {
    }

    public static function isClienteRegistered(string $tel = null, string $nif_cif = null){
        return self::where('telefono', $tel)->where('cif', $nif_cif)->exists();
    }

    public static function getClientes(){
        return self::all();
    }

    public static function getIdFromNifTelephone(string $tel = null, string $nif_cif = null){
        return self::where('telefono', $tel)->where('cif', $nif_cif)->value('id');
    }
}
