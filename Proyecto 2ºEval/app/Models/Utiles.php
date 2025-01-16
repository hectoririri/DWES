<?php

namespace App\Models;
use App\Models\Usuarios;
use App\Models\Tareas;

class utiles
{
    /**
     * Clase para realizar validaciones de formularios y otras utilidades
     * 
     * @var Tareas
     * @var Usuarios
     */
    private $tareas;
    private $usuarios;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->tareas = new Tareas();
        $this->usuarios = new Usuarios();
    }

   /**
     * Comprueba si el campo existe o no y devuelve su valor si es así. Vacío si no
     *
     * @param string $campo
     * @return string valor del campo o vacío
     */
    function ValorPost($campo)
    {
        if (isset($_POST[$campo]))
            return $_POST[$campo];
        else
            return '';
    }

    
    /**
     * Validar DNI (NIF), CIF, NIE
     *
     * @param string $dni Numero de identificación
     *
     * @return bool Si es ok(true) o no(false)
     */
    function validDniCifNie($dni)
    {
        $cif = strtoupper($dni);
        for ($i = 0; $i < 9; $i++) {
            $num[$i] = substr($cif, $i, 1);
        }
        // Si no tiene un formato valido devuelve error
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return false;
        }
        // Comprobacion de NIFs estandar
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Algoritmo para comprobacion de codigos tipo CIF
        $suma = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2) {
            $suma += (int)substr((2 * $num[$i]), 0, 1) + (int)substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($suma, strlen($suma) - 1, 1);
        // Comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
        if (preg_match('/^[KLM]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Comprobacion de CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Comprobacion de NIEs
        // T
        if (preg_match('/^[T]{1}/', $cif)) {
            if ($num[8] == preg_match('/^[T]{1}[A-Z0-9]{8}$/', $cif)) {
                return true;
            } else {
                return false;
            }
        }
        // XYZ
        if (preg_match('/^[XYZ]{1}/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X', 'Y', 'Z'), array('0', '1', '2'), $cif), 0, 8) % 23, 1)) {
                return true;
            } else {
                return false;
            }
        }
        // Si todavía no se ha verificado devuelve error
        return false;
    }

    /**
     * Validaciones para el formulario de alta o modificación de tareas
     *
     * @param object $errores errores del formulario
     * @return void
     */
    function validacionesFormTarea($errores)
    {
        $array_provincias = $this->tareas->recogerProvincias();
        $array_operarios = $this->usuarios->recogerOperarios();

        $patron_nom = "/^[A-Za-záéíóúÁÉÍÓÚñÑ]+$/";
        // Comprobación de nombre con la expresión regular
        if (!preg_match($patron_nom, $_POST['nombre']))
            $errores->AnotaError('nombre', 'Error en el campo nombre.  Solo letras ');

        // Comprobación de apellidos con la expresión regular
        if (!preg_match($patron_nom, $_POST['apellidos']))
            $errores->AnotaError('apellidos', 'Error en el campo apellidos.  Solo letras ');

        // Comprobación de descripción
        if ($_POST['descripcion'] == '')
            $errores->AnotaError('descripcion', ' El campo descripción no puede estar vacío ');

        // Creamos expresión regular para el campo telefono
        $patron_tel = "/^\+\d{1,3}\s\d{3}[-\s]?\d{2}[-\s]?\d{2}[-\s]?\d{2}$/";
        // Comprobación de télefono
        if (!preg_match($patron_tel, trim($_POST['telefono'])))
            $errores->AnotaError('telefono', 'Formato en el campo teléfono. Ej: +34 123-45-67-89 || +34 123 45 67 89 || +34 123456789');

        // Comprobación de NIF/CIF
        if (!$this->validDniCifNie(trim($_POST['nif_cif'])))
            $errores->AnotaError('nif/cif', 'Formato incorrecto en el campo nif/cif. Ej: 12345678Z');

        // Creamos expresión regular para el campo código postal
        $patron_cod_postal = "/^\d{5}?$/";
        // Comprobación de codigo postal
        if (!preg_match($patron_cod_postal, trim($_POST['cod_postal'])))
            $errores->AnotaError('cod_postal', 'Formato incorrecto de código postal. Ej: 12345');

        // Comprobación de provincia
        if ($_POST['provincia'] == '' || (!in_array($_POST['provincia'], $array_provincias)))
            $errores->AnotaError('provincia', 'Debes seleccionar una provincia.');

        // Comprobación de email usando Filter.
        if (!filter_var(trim($_POST['correo']), FILTER_VALIDATE_EMAIL))
            $errores->AnotaError('correo', 'Formato incorrecto de email. Ej: hola@gmail.com');


        // Comprobación fecha de realización y fecha creación
        $fecha_realizacion = explode("-", $_POST['fecha_realizacion']);
        
        if (!isset($_POST['fecha_creacion'])) {
            $_POST['fecha_creacion'] = date('d-m-Y');
        }

        // Comprueba formato de fecha
        if (count($fecha_realizacion) == 3) {
            if (!checkdate((int)($fecha_realizacion[1]), (int)($fecha_realizacion[2]), (int)($fecha_realizacion[0]))) {
                $errores->AnotaError('fecha_realizacion', 'Formato incorrecto de la fecha de realizacion');
            } else {
                $fecha_realizacion_time = strtotime($_POST['fecha_realizacion']);
                $fecha_creacion_time = strtotime($_POST['fecha_creacion']);
                if ($fecha_creacion_time > $fecha_realizacion_time)
                    $errores->AnotaError('fecha_realizacion', 'Fecha incorrecta. Debe ser posterior a la fecha de creación');
            }
        } else {
            $errores->AnotaError('fecha_realizacion', 'Error en el campo fecha realización');
        }

        // Comprobación de operario
        if (!in_array(trim($_POST['operario']), $array_operarios))
            $errores->AnotaError('operario', 'Debes seleccionar un operario.');
        return $errores;
    }

    /**
     * Validaciones para el formulario de completar tarea
     *
     * @param object $errores errores del formulario
     * @param array $tarea tarea a completar
     * @return void
     */
    function validacionesCompletarTarea($errores, $tarea){
        if (empty($_POST['estado']))
            $errores->AnotaError('estado', 'Debes seleccionar una opción');

        if ($_POST['anotaciones_posteriores'] == '')
            $errores->AnotaError('anotaciones_posteriores', 'No puede estar vacío. Introduzca texto');

        // Comprueba formato de fecha
        $fecha_realizacion = explode("-", $_POST['fecha_realizacion']);
        if (count($fecha_realizacion) == 3) {
            if (!checkdate((int)($fecha_realizacion[1]), (int)($fecha_realizacion[2]), (int)($fecha_realizacion[0]))) {
                $errores->AnotaError('fecha_realizacion', 'Formato incorrecto de la fecha de realizacion');
            } else {
                $fecha_realizacion_time = strtotime($_POST['fecha_realizacion']);
                $fecha_creacion_time = strtotime($tarea['fecha_creacion']);
                if ($fecha_creacion_time > $fecha_realizacion_time)
                    $errores->AnotaError('fecha_realizacion', 'Fecha incorrecta. Debe ser posterior a la fecha de creación');
            }
        } else {
            $errores->AnotaError('fecha_realizacion', 'Error en el campo fecha realización');
        }
    }   

    /**
     * Validaciones para el formulario de alta o modificación de usuarios
     *
     * @param object $errores errores del formulario 
     * @param string $tipo tipo de formulario
     * @return void
     */
    function validacionesFormUsuario(object $errores, string $tipo)
    {
        $existeUsuario = $this->usuarios->recogerUsuario(null, $_POST['nombre'], '');
        if ($tipo == 'alta' && !empty($existeUsuario))
            $errores->AnotaError('nombre', 'El nombre no puede estar vacío o el usuario ya existe');

        $patron_passwd = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]{8,}$/";
        if ($_POST['passwd'] == '' || !preg_match($patron_passwd, $_POST['passwd']))
            $errores->AnotaError('passwd', 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial');
        if (!isset($_POST['rol']) || $_POST['rol'] == '')
            $errores->AnotaError('rol', 'Debes seleccionar un rol');
        return $errores;
    }

    /**
     * Comprueba el tipo de formulario para mostrar un texto u otro
     *
     * @param string $campo
     * @return string título del formulario
     */

    function tituloFormulario(String $tipo){
        if ($tipo == "alta") {
            return "Formulario de alta";
        } else {
            return "Formulario de modificación";
        }
    }

    /**
     * Comprueba si la tarea está vacía
     *
     * @param array $tarea
     * @return void
     */
    function emptyTarea($tarea){
        if (empty($tarea)) {
            header('Location: '.miurl('mostrar/tareas?error=1'));
            exit();
        }
    }

    /**
     * Comprueba si el usuario está vacío
     *
     * @param array $usuario
     * @return void
     */
    function emptyUsuario($usuario){
        if (empty($usuario)) {
            header('Location: '.miurl('mostrar/usuarios?error=1'));
            exit();
        }
    }
}
