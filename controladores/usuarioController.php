<?php

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "controladores/baseController.php";
require_once "controladores/loginController.php";
require_once "libs/Sesion.php";
require_once "modelos/usuario.php";

class UsuarioController extends BaseController{

    private $sesion;

    /**
     * Instanciamos la sesion para controlar que seguimos logueados
     * sino redirigimos al inicio de login
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Borra al usuario de la base de datos
     */
    public function delete(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $id = $_GET["id"];
        Usuario::borrarUsuario($id);
        LoginController::inicio();
    }

    /**
     * Nos redirige a la página de edicion 
     * del usuario
     */
    public function editar(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig    = new BaseController();
        $id      = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $twig->renderizar("perfilUsuario.php.twig",["usuario" => $usuario]);

    }

    /**
     * Nos redirige al listado de 
     * los puestos del mercado
     */
    public function inicio(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig    = new BaseController();
        $id      = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $puestos = Puesto::listarPuestos();
        $twig->renderizar("listadoPuestos.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
    }

    /**
     * Muestra el listado de 
     * los puestos favoritos del usuario
     */
    public function favoritos(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig    = new BaseController();
        $id      = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $puestos = Puesto::buscarFavoritos($id);
        $fav     = "favoritos";
        $twig->renderizar("listadoPuestos.php.twig",["usuario" => $usuario,"puestos" => $puestos,"favoritos" => $fav]);
    }

    /**
     * Hace que un puesto concreto se añada
     * como favorito a la lista del usuario
     * 
     */
    public function favorito(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig       = new BaseController();
        $id         = $_GET["id"];
        $idPuesto   = $_GET["idPuesto"];
        $usuario    = Usuario::buscarUsuario($id);

        if(!$usuario->buscarFavorito($id,$idPuesto)):
            $usuario->guardarFavorito($id,$idPuesto);
        endif;
        $puesto = Puesto::buscarPuesto($idPuesto);

        $twig->renderizar("infoPuesto.php.twig",["usuario" => $usuario,"puesto" => $puesto]);
    }
    /**
     * Elimina un puesto
     * como favorito de la lista del usuario
     * 
     */
    public function noFavorito(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig        = new BaseController();
        $id          = $_GET["id"];
        $idPuesto    = $_GET["idPuesto"];
        $usuario     = Usuario::buscarUsuario($id);
        $usuario->borrarFavorito($id,$idPuesto);
        $puesto      = Puesto::buscarPuesto($idPuesto);

        $twig->renderizar("infoPuesto.php.twig",["usuario" => $usuario,"puesto" => $puesto]);
    }

    /**
     * Modifica el perfil del usuario
     */
    public function modificar(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig       = new BaseController();
        $nombre     = $_GET["nombre"]; 
        $apellido   = $_GET["apellido"]; 
        $email      = $_GET["email"];
        $telefono   = $_GET["telefono"];
        $id         = $_GET["id"];
        $usuario    = Usuario::buscarUsuario($id);

        if(!empty($_GET["foto"])):
            $foto = $_GET["foto"];
            $usuario->setFoto($foto);
        endif;

        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setEmail($email);
        $usuario->setTelefono($telefono);
        
        if($usuario->modificarUsuario()):
            $respuesta = "actualizado";
        else:
            $respuesta = "error";
        endif;

        $twig->renderizar("perfilUsuario.php.twig",["usuario" => $usuario,"respuesta" => $respuesta]);
    }

    /**
     * Nos dirige a la vista de los puestos creados 
     * por un usuario vendedor
     * 
     */
    public function buscar(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig    = new BaseController();
        $id      = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $puestos = Puesto::buscarPuestosUsuario($id);
        $twig->renderizar("infoPuesto.php.twig",["usuario" => $usuario,"puestos" => $puestos]);
    }

    /**
     * Te dirige a la página de registro de usuario
     */
    public function anadir(){
        $twig        = new BaseController();
        $nombre      = $_GET["nombre"]; 
        $apellido    = $_GET["apellido"]; 
        $email       = $_GET["email"];
        $telefono    = $_GET["telefono"];
        if(empty($_GET["foto"])):
            $foto        = "tio.jpg";
        else:
            $foto        = $_GET["foto"];
        endif;
        $contrasena  = $_GET["pass"];
        $contrasena2 = $_GET["conf"];

        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setEmail($email);
        $usuario->setTelefono($telefono);
        $usuario->setFoto($foto);
        $usuario->setPassword($contrasena);

        if(!isset($_GET["vendedor"])):
            $vendedor = false;
        elseif($_GET["vendedor"] == "true"):
            $vendedor = true;
        else:
            $vendedor = false;
        endif;
        $usuario->setSolicitaVendedor($vendedor);
        $usuario->setIdTipo(3);
        if($contrasena == $contrasena2):
            if($usuario->guardarUsuario()):
                $twig->renderizar("login.php.twig",["inicio" => 'true']);
            else:
                $respuesta = "error";
                $twig->renderizar("registroUsuario.php.twig",["respuesta" => $respuesta]);
            endif;

        else:
            $respuesta = "contraseña";
            $twig->renderizar("registroUsuario.php.twig",["respuesta" => $respuesta]);
        endif;
    }

    /**
     * Genera una ApiKey aleatoria para el usuario
     */
    public function creaApi(){
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        $twig    = new BaseController();
        $id      = $_GET["id"];
        $usuario = Usuario::buscarUsuario($id);
        $usuario->creaApiKey($id);
        $usuario = Usuario::buscarUsuario($id);
        $twig->renderizar("perfilUsuario.php.twig",["usuario" => $usuario]);
    }

}

 