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
    const CREATED_AT = 'fecha_alta';
    const UPDATED_AT = 'fecha_actualizado';
    
    public function mostrarTareas(){
        $tareas = Tareas::get();
        return $tareas;
    }

    // /**
    //  * Orden SQL para crear una tarea
    //  * @return bool true se ha creado la tarea, false no se ha creado
    //  */
    // public function crearTarea()
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("INSERT INTO tareas (nombre, apellidos, nif_cif, telefono, descripcion, correo, direccion, poblacion, cod_postal, 
    //         provincia, estado, fecha_creacion, operario, fecha_realizacion, anotaciones_anteriores, anotaciones_posteriores) 
    //         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    //         $stmt->execute([
    //             $_POST['nombre'] ?? null,
    //             $_POST['apellidos'] ?? null,
    //             $_POST['nif_cif'] ?? null,
    //             $_POST['telefono'] ?? null,
    //             $_POST['descripcion'] ?? null,
    //             $_POST['correo'] ?? null,
    //             $_POST['direccion'] ?? null,
    //             $_POST['poblacion'] ?? null,
    //             $_POST['cod_postal'] ?? null,
    //             $_POST['provincia'] ?? null,
    //             $_POST['estado'] ?? 'B',
    //             $_POST['fecha_creacion'] ?? date('d-m-Y'),
    //             $_POST['operario'] ?? null,
    //             $_POST['fecha_realizacion'] ?? null,
    //             $_POST['anotaciones_anteriores'] ?? null,
    //             $_POST['anotaciones_posteriores'] ?? null,
    //         ]);
    //         return true;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return false;
    //     }
    // }

    // /**
    //  * Modificar tarea
    //  *
    //  * @param int $id -> id de la tarea a modificar
    //  * @return void
    //  */
    // public function modificarTarea($id)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("UPDATE tareas SET nombre = ?, apellidos = ?, nif_cif = ?, telefono = ?, descripcion = ?, correo = ?, 
    //         direccion = ?, poblacion = ?, cod_postal = ?, provincia = ?, estado = ?, fecha_creacion = ?, operario = ?, fecha_realizacion = ?, 
    //         anotaciones_anteriores = ?, anotaciones_posteriores = ? WHERE id = ?");
    //         $result = $stmt->execute([
    //             $_POST['nombre'] ?? null,
    //             $_POST['apellidos'] ?? null,
    //             $_POST['nif_cif'] ?? null,
    //             $_POST['telefono'] ?? null,
    //             $_POST['descripcion'] ?? null,
    //             $_POST['correo'] ?? null,
    //             $_POST['direccion'] ?? null,
    //             $_POST['poblacion'] ?? null,
    //             $_POST['cod_postal'] ?? null,
    //             $_POST['provincia'] ?? null,
    //             $_POST['estado'] ?? 'B',
    //             $_POST['fecha_creacion'] ?? date('d-m-Y'),
    //             $_POST['operario'] ?? null,
    //             $_POST['fecha_realizacion'] ?? null,
    //             $_POST['anotaciones_anteriores'] ?? null,
    //             $_POST['anotaciones_posteriores'] ?? null,
    //             $id,
    //         ]);
    //         return $result;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return false;
    //     }
    // }

    // /**
    //  * Completar tarea
    //  *
    //  * @param int $id -> id de la tarea a completar
    //  * @return void
    //  */
    // public function completarTarea(int $id)
    // {
    //     try {
    //         $utiles = new Utiles();
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("UPDATE tareas SET estado = ?, fecha_realizacion = ?, anotaciones_posteriores = ? WHERE id = ?");
    //         $stmt->execute([
    //             $utiles->ValorPost('estado') ?: 'P',
    //             $utiles->ValorPost('fecha_realizacion') ?: null,
    //             $utiles->ValorPost('anotaciones_posteriores') ?: null,
    //             $id
    //         ]);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //     }
    // }

    // /**
    //  * Recoge todas las tareas de la base de datos
    //  *
    //  * @return array tareas
    //  */
    // public function recogerTareas()
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->query("SELECT * FROM tareas ORDER BY fecha_realizacion DESC;");
    //         while ($row = $stmt->fetch()) {
    //             $tareas[] = $row;
    //         }
    //         return $tareas;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Recoge una tarea de la base de datos
    //  *
    //  * @param int $id -> id de la tarea a recoger
    //  * @return array tarea
    //  */
    // public function recogerTarea(int $id)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare('SELECT * FROM tareas WHERE id = ?;');
    //         $stmt->execute([$id]);
    //         $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //         return $stmt->fetch();
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Recoge las tareas pendientes de la base de datos en orden descendente
    //  *
    //  * @return array tareas pendientes
    //  */
    // public function recogerTareasPendientesPaginadas($pagina, $tareasPorPagina)
    // {
    //     $db = DataBase::getInstance();
    //     $inicio = ($pagina - 1) * $tareasPorPagina;
    //     $sql = "SELECT * FROM tareas WHERE estado = 'P' LIMIT $inicio, $tareasPorPagina";
    //     $stmt = $db->conn->query($sql);
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // /**
    //  * Borra una tarea
    //  *
    //  * @param int $id -> id de la tarea a borrar
    //  * @return bool true se ha borrado la tarea, false no se ha borrado
    //  */
    // public function borrarTarea($id)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare('DELETE FROM tareas WHERE id = ?;');
    //         $stmt->execute([$id]);
    //         return true;
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return false;
    //     }
    // }

    //  /**
    //  * Recoge las provincias de la base de datos
    //  *
    //  * @return array provincias
    //  */
    // public function recogerProvincias(){
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->query("SELECT nombre FROM provincias;");
    //         while ($row = $stmt->fetch()) {
    //             $provincias[] = $row['nombre'];
    //         }
    //         return $provincias;
    //     } catch (PDOException $e) {
    //         echo 'Error: '.$e->getMessage();
    //         return [];
    //     }
    // }

    // /**
    //  * Recoge las tareas de la base de datos con paginación
    //  *
    //  * @param int $inicio -> inicio de la paginación
    //  * @param int $elementosPorPagina -> elementos por página
    //  * @return array tareas
    //  */
    // public function recogerTareasPaginadas(int $inicio = 1, $elementosPorPagina)
    // {
    //     try {
    //         $db = DataBase::getInstance();
    //         $stmt = $db->conn->prepare("SELECT * FROM tareas ORDER BY fecha_realizacion DESC LIMIT ?, ?;");
    //         $stmt->bindParam(1, $inicio, PDO::PARAM_INT);
    //         $stmt->bindParam(2, $elementosPorPagina, PDO::PARAM_INT);
    //         $stmt->execute();
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo 'Error: ' . $e->getMessage();
    //         return [];
    //     }
    // }
}
