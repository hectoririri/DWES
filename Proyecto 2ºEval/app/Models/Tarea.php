<?php

namespace App\Models;

use App\Models\DataBase;
use App\Models\Utiles;
use Illuminate\Database\Eloquent\Model;
use PDO;
use PDOException;

class Tarea extends Model
{
    protected $table = "tareas";
    protected $primaryKey = "id";
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
    // Se castea para que no salte el formato ISO 8601
    protected $casts = [
        'fecha_creacion' => 'datetime:d-m-Y H:i:s',
        'fecha_actualizacion' => 'datetime:d-m-Y H:i:s',
    ];
    protected $fillable = ['descripcion', 'correo', 'direccion', 'poblacion', 'cod_postal', 'provincia', 'estado', 'fecha_creacion', 'operario', 'fecha_realizacion', 'anotaciones_anteriores', 'anotaciones_posteriores', 'usuario_id'];
    
    /**
     * Declaramos la relación muchos a uno con la tabla usuarios
     *
     * @return void
     */
    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function __construct()
    {
    }

    /**
     * Devuelve una colección con todas las tareas
     *
     * @return void
     */
    public static function getTareas()
    {
        $tareas = self::paginate(5);
        return $tareas;
    }

    /**
     * Devuelve una colección con una tarea
     *
     * @param integer $id id de la tarea
     * @return void
     */
    public static function getTarea(int $id)
    {
        $tarea = self::where('id', $id)->first();
        return $tarea;
    }

    /**
     * Devuelve una colección con las tareas pendientes
     *
     * @return void
     */
    public static function getTareaPendientes()
    {
        $tareas = self::where('estado', 'P')->paginate(5);
        return $tareas;
    }
}
