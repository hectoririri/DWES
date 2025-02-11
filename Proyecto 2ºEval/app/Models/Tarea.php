<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    protected $fillable = ['descripcion', 'correo', 'direccion', 'poblacion', 'cod_postal', 'provincia', 'estado', 'fecha_creacion', 'operario_id', 'fecha_realizacion', 'anotaciones_anteriores', 'anotaciones_posteriores', 'cliente_id'];
    
    /**
     * Declaramos la relación muchos a uno con la tabla usuarios
     *
     * @return void
     */
    public function usuarios()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function getTareaUrlAtributte(): string
    {
        // mirar en qwen para solucionar
        return Storage::disk('tareas')->url($this->fichero);
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
    public static function getTareasPendientes()
    {
        $tareas = self::where('estado', 'P')->orWhere('estado', 'B')->paginate(5);
        return $tareas;
    }

    public static function getTareasPendientesOperario(int $id)
    {
        // orWhere applies to the entire query, not just the tasks of the specified user
        // $tareas = Usuario::find($id)->tareas()->where('estado', 'P')->orWhere('estado', 'B')->paginate(5);
        return Usuario::find($id)->tareas()->where(function($query) {
            $query->where('estado', 'P')
                  ->orWhere('estado', 'B');
        })->paginate(5);
        return $tareas;
    }

    public static function getTareasSinOperario()
    {
        $tareas = self::where('operario_id', null)->paginate(5);
        return $tareas;
    }

    /* Todas las tareas que su operario no exista
    public static function getTareasOperarioEliminado()
    {
        $tareas = self::where('operario_id', null)->paginate(5);
        return $tareas;
    }
    */
    public static function getTareasOperario(int $id)
    {
        return Usuario::find($id)->tareas()->paginate(5);
    }
}
