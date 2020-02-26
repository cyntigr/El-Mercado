<?php

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "controladores/baseController.php";
require_once "controladores/apiController.php";
require_once "modelos/usuario.php";
require_once "modelos/puesto.php";
require_once "libs/Sesion.php";

class ApiController extends BaseController{

    private $sesion;
    /**
     * Instanciamos la sesion para controlar que seguimos logueados
     * sino redirigimos al inicio de login
     */
    public function __construct()
    {
        parent::__construct();
        $this->sesion = Sesion::getInstance();
        // comprobar si hay una sesión activa
        if (!$this->sesion->checkActiveSession()):
            LoginController::inicio();
        endif;
        
    }

    /**
     * http://localhost/mercado/index.php?con=api&op=infoPuesto&apiKey=buenasPuedeProbarLaApi&id=19
     * para buscar todos los puestos se utiliza esta URL
     */
    function infoPuesto()
    {
        $id = $_GET["id"];
        $data = [];
        $puesto = Puesto::buscarPuesto($id);
        $data = [
            "Id"                => $puesto->getIdPuesto(),
            "Nombre Puesto"     => $puesto->getNombre(),
            "Imagen"            => $puesto->getFoto(),
            "Informacion"       => $puesto->getInfoPuesto()
        ];
        
        // devolvemos el contenido especificando que es JSON
        header("Content-Type: application/json;");
        header("charset=utf-8");

        echo json_encode($data);
        $twig    = new BaseController();
        $twig->renderizar("api.php.twig");
    }

    /**
     * http://localhost/mercado/index.php?con=api&op=infoGlobal&apiKey=buenasPuedeProbarLaApi
     * para buscar todos los puestos se utiliza esta URL
     */
    function infoGlobal()
    {
        $apiKey = $_GET["apiKey"];

        $respuesta = Usuario::buscarUsuarioApi($apiKey);
        if($respuesta):
            $item = Puesto::listarPuestos();
            $data = array();
            foreach ( $item as $row) {
                $data[] = [
                    "Id"                => $row->getIdPuesto(),
                    "Nombre Puesto"     => $row->getNombre(),
                    "Imagen"            => $row->getFoto(),
                    "Informacion"       => $row->getInfoPuesto()
                ];
            }
        else:
            $data = [
                "Codigo" => 500,
                "Mensaje" => "No se encuentran los puestos."
            ];
        endif;
        // devolvemos el contenido especificando que es JSON
        header("Content-Type: application/json;");
        header("charset=utf-8");

        echo(json_encode($data));
        $twig    = new BaseController();
        $twig->renderizar("api.php.twig");
    }

    /**
     * http://localhost/mercado/index.php?con=api&op=infoUsuario&apiKey=buenasPuedeProbarLaApi&idUsu=3
     * para buscar un usuario concreto se utiliza esta URL
     */
    public function infoUsuario()
    {
        $apiKey = $_GET["apiKey"];
        $idUsu  = $_GET["idUsu"];
        $usuario  = Usuario::buscarUsuarioApi($apiKey);
        $usuario2 = Usuario::buscarUsuario($idUsu);
        $idApi = $usuario->getIdUsuario();
        $idUsuario = $usuario2->getIdUsuario();

        //comprobamos que la api coincide con el usuario que la esta utilizando
        if (!($idApi == $idUsuario)) :

            $respuesta =  false;
        else :
            $respuesta = true;
        endif;

        if($respuesta):
            $usuario = Usuario::buscarUsuario($idUsu);
            $data = [
                    "Id Usuario"       => $usuario->getIdUsuario(),
                    "Nombre"           => $usuario->getNombre(),
                    "Apellidos"        => $usuario->getApellido(),
                    "Email"     	   => $usuario->getEmail(),
                    "Telefono"		   => $usuario->getTelefono(),
                    "Foto"			   => $usuario->getFoto(),
                    "Api"			   => $usuario->getApiKey()
                ];
        else:
            $data = [
                "Codigo" => 500,
                "Mensaje" => "No se encuentra el puesto indicado"
            ];
        endif;    
        // devolvemos el contenido especificando que es JSON
        header("Content-Type: application/json;");
        header("charset=utf-8");

        echo json_encode($data);
        $twig    = new BaseController();
        $twig->renderizar("api.php.twig");
    }
}