<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['dni', 'telefono', 'direccion', 'rol', 'name', 'email', 'password'];
    // Se castea para que no salte el formato ISO 8601
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];
    use SoftDeletes;

    /**
     * Declaramos la relación uno a muchos con la tabla tareas
     *
     * @return void
     */
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'operario_id', 'id');
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
