<?php
namespace App\Models;

use App\Models\DataBase;
use Illuminate\Database\Eloquent\Model;
use PDO;
use PDOException;

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
        $usuarios = Usuarios::get();
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

    // /**
    //  * Clase que se encarga de las ordenes SQL de los usuarios
    //  * @param String $nombre, nombre del usuario
    //  * @param String $clave, contraseña del usuario
    //  * @return Array, datos del usuario
    //  */
    // public function __construct(){}

    // /**
    //  * Recoge un usuario de la base de datos. Si no existe, devuelve un array vacío.
    //  * @param int $id, id del usuario
    //  * @param String $nombre, nombre del usuario
    //  * @param String $clave, contraseña del usuario
    //  * @return Array, usuario
    //  */
    // public function recogerUsuario(int $id = null, String $nombre = '', String $clave = '',)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         // Si se recoge un id, se recoge el usuario por id
    //         if ($id) {
    //             $stmt = $db->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    //             $stmt->execute([$id]);
    //             return $stmt->fetch(PDO::FETCH_ASSOC);
    //         // Si se recoge un nombre, se recoge el usuario por nombre
    //         } else if ($nombre && $clave == '') { 
    //             $stmt = $db->conn->prepare("SELECT * FROM usuarios WHERE nombre = ?");
    //             $stmt->execute([$nombre]);
    //             return $stmt->fetch(PDO::FETCH_ASSOC);
    //         }
    //         // Si se recoge un nombre y una clave, se recoge el usuario por nombre y clave
    //         $stmt = $db->conn->prepare("SELECT nombre, passwd, rol FROM usuarios WHERE nombre = ? AND passwd = ?");
    //         $stmt->execute([$nombre, $clave]);
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Recoge los usuarios de la base de datos. Si no existen, devuelve un array vacío.
    //  * @return Array, usuarios
    //  */
    // public function recogerUsuarios()
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->query("SELECT * FROM usuarios ORDER BY nombre");
    //         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //             $usuarios[] = $row;
    //         }
    //         return $usuarios;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Recoge los operarios de la base de datos. Si no existen, devuelve un array vacío.
    //  * @return Array, operarios
    //  */
    // public function recogerOperarios(){
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->query("SELECT nombre FROM usuarios WHERE rol = 'O' ORDER BY nombre");
    //         while ($row = $stmt->fetch()) {
    //             $operarios[] = $row['nombre'];
    //         }
    //         return $operarios;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Crea un usuario en la base de datos.
    //  * @return void
    //  */
    // public function crearUsuario()
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("INSERT INTO usuarios (nombre, passwd, rol) VALUES (?, ?, ?)");
    //         $stmt->execute([$_POST['nombre'], $_POST['passwd'], $_POST['rol']]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }

    // /**
    //  * Modifica un usuario de la base de datos.
    //  * @param int $id, id del usuario
    //  * @return void
    //  */
    // public function modificarUsuario($id)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("UPDATE usuarios SET nombre = ?, passwd = ?, rol = ? WHERE id = ?");
    //         $stmt->execute([$_POST['nombre'], $_POST['passwd'], $_POST['rol'], $id]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }

    // /**
    //  * Borra un usuario de la base de datos.
    //  * @param int $id, id del usuario
    //  * @return void
    //  */
    // public function borrarUsuario($id){
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("DELETE FROM usuarios WHERE id = ?");
    //         $stmt->execute([$id]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }
}
