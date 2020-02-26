<?php

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "controladores/baseController.php";
require_once "modelos/usuario.php";
require_once "modelos/puesto.php";
require_once "libs/Sesion.php";

class LoginController extends BaseController{

    private $sesion;

    public function __construct()
    {
        parent::__construct();
        $this->sesion = Sesion::getInstance();
    }

    public function inicio(){
        $twig = new BaseController();
        if(!isset($_GET["inicio"])):
            $twig->renderizar("login.php.twig",["inicio" => 'true']);
        else:
            $twig->renderizar("login.php.twig",["inicio" => 'false']);
        endif;
    }

    public function registro(){
        $twig = new BaseController();
        $twig->renderizar("registroUsuario.php.twig");
    }

    public function login(){
        $twig = new BaseController();

        $email = $_GET["email"];
        $contrasena = $_GET["contrasena"];
        $usuario = Usuario::logueo($email,$contrasena);
        if($usuario):
            $this->sesion->login();
            $puestos = Puesto::listarPuestos();
            $twig->renderizar("listadoPuestos.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
        else:
            $twig->renderizar("login.php.twig",["inicio" => 'false', "ok" => "true"]);
        endif;
    }

    public function logout(){
        $twig = new BaseController();
        $this->sesion->logout();
        $twig->renderizar("login.php.twig",["inicio" => 'true']);
    }
}