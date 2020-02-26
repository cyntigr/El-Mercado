<?php

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "controladores/baseController.php";
require_once "controladores/loginController.php";
require_once "libs/Sesion.php";
require_once "modelos/puesto.php";
require_once "modelos/usuario.php";

class PuestoController extends BaseController{

    private $sesion;

    public function __construct()
    {
        parent::__construct();
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if(!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
    }

    /**
     * Busca un puesto para mostrar la información
     * en la pantalla infoPuesto
     */
    public function info(){
        $twig = new BaseController();
        $id = $_GET["id"];
        $idPuesto = $_GET["idPuesto"];
        $usuario = Usuario::buscarUsuario($id);
        $puesto = Puesto::buscarPuesto($idPuesto);
        $twig->renderizar("infoPuesto.php.twig",["usuario" => $usuario,"puesto" => $puesto]);
    }

    /**
     * Hace una busqueda de los puestos del usuario
     * vendedor y los muestra en la vista
     * puestosVendedor
     */
    public function buscar(){
        $twig = new BaseController();
        $id = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $puestos = Puesto::buscarPuestosUsuario($id);
        $twig->renderizar("puestosVendedor.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
    }

    /**
     * Redirigimos a la página de edición de
     * un puesto en concreto
     */
    public function editar(){
        $twig = new BaseController();
        $id = $_GET["id"];
        $idPuesto = $_GET["idPuesto"];
        $usuario = Usuario::buscarUsuario($id);
        $puesto = Puesto::buscarPuesto($idPuesto);
        $twig->renderizar("editarPuesto.php.twig",["usuario" => $usuario,"puesto" => $puesto]);
    }

    /**
     * Modifica un puesto concreto
     */
    public function modificar(){
        $twig = new BaseController();
        $nombre = $_GET["nombre"]; 
        $telefono = $_GET["telefono"];
        
        $infoPuesto = $_GET["infoPuesto"];
        $id = $_GET["id"];
        $idPuesto = $_GET["idPuesto"];
        $usuario = Usuario::buscarUsuario($id);
        $puesto = Puesto::buscarPuesto($idPuesto);
        $puesto->setNombre($nombre);
        $puesto->setTelefono($telefono);
        $puesto->setInfoPuesto($infoPuesto);
        if(!empty($_GET["foto"])):
            $foto = $_GET["foto"];
            $puesto->setFoto($foto);
        endif;
        if($puesto->modificarPuesto()):
            $respuesta = "actualizado";
        else:
            $respuesta = "error";
        endif;
        $twig->renderizar("editarPuesto.php.twig",["usuario" => $usuario,"puesto" => $puesto,"respuesta" => $respuesta]);
    }

    /**
     * Crea un puesto nuevo
     */
    public function nuevo(){
        $twig = new BaseController();
        $nombre = $_GET["nombre"]; 
        $telefono = $_GET["telefono"];
        $infoPuesto = $_GET["infoPuesto"];
        $id = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $puesto = new Puesto();
        $puesto->setNombre($nombre);
        $puesto->setTelefono($telefono);
        if(empty($_GET["foto"])):
            $foto = "fondo.jpg";
        else:
            $foto = $_GET["foto"];
        endif;
        $puesto->setFoto($foto);
        $puesto->setIdUsuario($id);
        $puesto->setInfoPuesto($infoPuesto);
        $puesto->crearPuesto();
        $puestos = Puesto::buscarPuestosUsuario($id);
        $twig->renderizar("puestosVendedor.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
    }

    /**
     * Me redirige a la página
     * necesaria para crear un nuevo puesto
     */
    public function anadir(){
        $twig = new BaseController();
        $id = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $twig->renderizar("editarPuesto.php.twig",["usuario" => $usuario]);
    }

    /**
     * Borra un puesto de la base de datos
     */
    public function delete()
    {
        $twig = new BaseController();
        $id = $_GET["id"];
        $idPuesto = $_GET["idPuesto"];
        Puesto::borrarPuesto($idPuesto);
        $usuario = Usuario::buscarUsuario($id);
        $puestos = Puesto::buscarPuestosUsuario($id);
        $twig->renderizar("puestosVendedor.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
    }
}