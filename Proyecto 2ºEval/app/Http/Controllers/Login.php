<?php

namespace App\Http\Controllers;

use App\Models\SesionUsuario;
use App\Models\Utiles;

class Login extends Controller
{

    /** 
     * Clase para gestionar el login de los usuarios
     * @var SesionUsuario
     */
    private $sesion;

    public function __construct()
    {
        $this->sesion = SesionUsuario::getInstance();
    }

    /**
     * Método para mostrar el formulario de login.
     * Comprobar si el usuario y la clave son correctos y redirigir a la página de inicio.
     * Guarda el nombre del usuario en una cookie y el de la contraseña si se ha marcado la casilla de recordar.
     * @return vista
     */
    public function login()
    {
        if ($_POST) {
            $usuario = $_POST['usuario'];
            $clave = $_POST['passwd'];

            // Si hace login, redirige a la página de home
            if ($this->sesion->login($usuario, $clave)) {
                if (isset($_POST['recordar'])) {
                    setcookie('usuario', $usuario, time() + 3600 * 24 * 3);
                    setcookie('passwd', $clave, time() + 3600 * 24 * 3);
                } else {
                    setcookie('usuario', $usuario);
                }
                header('Location: '.miurl('home'));
                exit();
            } else {
                return view('login', [
                    'error' => 'Usuario o contraseña incorrectos',
                    'utiles'=> new Utiles()
                ])->with('mostrarMenu', false);
            }
        } else {
            return view('login', [
                'utiles'=> new Utiles()
            ])->with('mostrarMenu', false);
        }
    }

    /**
     * Método para cerrar la sesión de un usuario
     * @return void
     */

    public function loggout()
    {
        $this->sesion->loggout();
    }
}
?>
