<?php

namespace App\Models;

use App\Models\DataBase;
use App\Models\Utiles;
use Illuminate\Database\Eloquent\Model;
use PDO;
use PDOException;

class Tareas extends Model
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
    protected $fillable = ['nombre', 'apellidos', 'nif_cif', 'telefono', 'descripcion', 'correo', 'direccion', 'poblacion', 'cod_postal', 'provincia', 'estado', 'fecha_creacion', 'operario', 'fecha_realizacion', 'anotaciones_anteriores', 'anotaciones_posteriores', 'id_usuario'];
    
    /**
     * Declaramos la relación muchos a uno con la tabla usuarios
     *
     * @return void
     */
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class);
    }

    public function __construct()
    {
    }

    /**
     * Devuelve una colección con todas las tareas
     *
     * @return void
     */
    public function getTareas()
    {
        $tareas = Tareas::paginate(5);
        return $tareas;
    }

    /**
     * Devuelve una colección con una tarea
     *
     * @param integer $id id de la tarea
     * @return void
     */
    public function getTarea(int $id)
    {
        $tarea = Tareas::where('id', $id)->first();
        return $tarea;
    }

    /**
     * Devuelve una colección con las tareas pendientes
     *
     * @return void
     */
    public function getTareasPendientes()
    {
        $tareas = Tareas::where('estado', 'P')->paginate(5);
        return $tareas;
    }
}
