<?php
/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "vendor/autoload.php";

class BaseController {

    protected $twig;

    public function __construct(){
        $loader = new Twig\Loader\FilesystemLoader("./vistas");
        $this->twig = new Twig\Environment($loader);
    }
    
    public function renderizar($vista,$parametros = []){
        echo $this->twig->render($vista,$parametros);
    }
}