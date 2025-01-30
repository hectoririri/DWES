<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

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
     * Devuelve una colección con todos los usuarios
     *
     * @return void
     */
    public static function getUsuarios(){
        $usuarios = self::paginate(5);
        return $usuarios;
    }

    /**
     * Devuelve una colección con un usuario
     *
     * @return void
     * @param int $id id del usuario
     */
    public static function getUsuario(int $id){
        $usuario = self::where('id', $id)->first();
        return $usuario;
    }

    /**
     * Devuelve una colección con los operarios
     *
     * @return void
     */
    public static function getOperarios(){
        $operarios = self::where('rol', 'O')->get();
        return $operarios;
    }
}
