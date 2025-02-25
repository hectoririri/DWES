<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuota extends Model
{
    protected $table = "cuotas";
    protected $primaryKey = "id";
    protected $guarded = [];

    /**
     * Relación uno a muchos con tabla clientes
     *
     * @return void
     */
    public function cliente(){
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    public static function getCuotas(){
        $cuotas = self::paginate(5);
        return $cuotas;
    }
}
