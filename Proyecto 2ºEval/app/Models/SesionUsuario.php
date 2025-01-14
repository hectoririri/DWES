<?php
namespace App\Models;
Use App\Models\Usuarios;

class SesionUsuario
{
    /** Clase para gestionar la sesión de un usuario
     * @var SesionUsuario
     * @var string $usuario Nombre del usuario
     * @var string $passwd Contraseña del usuario
     * @var string $urlLogin Página de login
     * @var Usuarios $usuariosDB Objeto de la clase Usuarios
     * @var $instance Instancia de la clase SesionUsuario
     */
    private static $instance = null;
    private $usuario;
    private $passwd;
    private $urlLogin;
    private $usuariosDB;

    /**
     * Constructor privado para evitar que se pueda instanciar la clase
     */
    private function __construct()
    {
        // Iniciamos la sesión
        session_start();
        $this->usuario = "";
        $this->passwd = "";
        $this->urlLogin = miurl('');
        $this->usuariosDB = new Usuarios();
    }

    /**
     * Método para obtener la instancia de la clase
     * @return SesionUsuario
     */
    public static function getInstance(): SesionUsuario
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Método para evitar que se pueda clonar la clase
     */
    private function __clone() {}

    /**
     * Método para comprobar si el usuario y contraseña introducidos son correctos y hacer login si es así
     * Se guarda el nombre del usuario, si es administrador y si está dentro en la sesión
     * @param string $user
     * @param string $clave
     * @return bool
     */
    public function login(string $user, string $clave): bool
    {
        // Recogemos usuario y clave de la base de datos
        $usuarioDatos = $this->usuariosDB->recogerUsuario(null,$user, $clave);
        if (!$usuarioDatos) { // No existe el usuario
            return false;
        }
        $this->usuario = $usuarioDatos['nombre']; 
        $this->passwd = $usuarioDatos['passwd']; 
        if ($this->usuario == $user  && $this->passwd == $clave) {
            // Usuario y clave correctos
            $_SESSION['dentro'] = true;
            $_SESSION['usuario'] = $this->usuario;
            $_SESSION['clave'] = $this->passwd;
            $_SESSION['admin'] = false;
            if ($usuarioDatos['rol'] == 'A') {
                $_SESSION['admin'] = true;
            }
            return true;
        }
        return false;
    }

    /**
     * Indica si un usuario está logeado
     * Devuelve true si está logeado y false si no lo está
     * @return boolean
     */
    public function isLogged(): bool
    {
        return !empty($_SESSION['dentro']);
    }

    /**
     * Comprueba si el usuario está logeado y si no está se redirige a la página de login indicada
     * @return void
     */
    public function onlyLogged(): void
    {
        if (!$this->isLogged()){
            header("Location: " . $this->urlLogin);
            exit();
        }
    }

    /**
     * Comprueba si el usuario es administrador
     * Devuelve true si es administrador y false si no lo es
     * @return void
     */
    public function isAdmin(): bool
    {
        return $_SESSION['admin'];
    }
    /**
     * Método para cerrar la sesión de un usuario
     * Se destruye la sesión y se redirige a la página de login
     * @return void
     */ 
    public function loggout() : void
    {
        $_SESSION['dentro'] = false;
        
        header("Location: " . $this->urlLogin);
        exit();
    }
}
?>