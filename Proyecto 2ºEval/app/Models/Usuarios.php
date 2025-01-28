<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = "usuarios";
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
     * Relación uno a uno con la tabla user
     *
     * @return void
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Constructor vacío
     */ 
    public function __construct()
    {
    }

    /**
     * Devuelve una colección con todos los usuarios
     *
     * @return void
     */
    public function getUsuarios(){
        $usuarios = Usuarios::paginate(5);
        return $usuarios;
    }

    /**
     * Devuelve una colección con un usuario
     *
     * @return void
     * @param int $id id del usuario
     */
    public function getUsuario(int $id){
        $usuario = usuarios::where('id', $id)->first();
        return $usuario;
    }

    /**
     * Devuelve una colección con los operarios
     *
     * @return void
     */
    public function getOperarios(){
        $operarios = Usuarios::where('rol', 'O')->get();
        return $operarios;
    }
}
