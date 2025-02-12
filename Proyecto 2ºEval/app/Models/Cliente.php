<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $primaryKey = "id";
    const CREATED_AT = 'fecha_alta';
    const UPDATED_AT = 'fecha_actualizado';
    protected $guarded = [];


    /**
     * Declaramos la relación uno a muchos con la tabla tareas
     *
     * @return hasMany
     */
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
    
    /**
     * Declaramos la relación uno a muchos con la tabla cuotas
     *
     * @return hasMany
     */
    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }

    /**
     * Declaramos la relación muchos a uno de la tabla paises
     *
     * @return BelongsTo
     */
    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class);
    }

    /**
     * Devuelve colección de todos los clientes activos activos
     *
     * @return void
     */
    public static function getClientes(){
        $clientes = self::paginate(5);
        return $clientes;
    }

    /**
     * Comprueba si el cliente existe verificando su teléfono y nif_cif
     *
     * @param string|null $tel
     * @param string|null $nif_cif
     * @return boolean
     */
    public static function isClienteRegistered(string $tel = null, string $nif_cif = null){
        return self::where('telefono', $tel)->where('cif', $nif_cif)->exists();
    }

    /**
     * Devuelve el id del cliente basándose en su teléfono y nif_cif 
     *
     * @param string|null $tel
     * @param string|null $nif_cif
     * @return void
     */
    public static function getIdFromNifTelephone(string $tel = null, string $nif_cif = null){
        return self::where('telefono', $tel)->where('cif', $nif_cif)->value('id');
    }
}
