<?php

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */

$con = $_GET["con"] ?? "login";
$op  = $_GET["op"]  ?? "inicio";

$name = $con."Controller";

require_once ($_SERVER['DOCUMENT_ROOT']."/controladores/$name.php");

$controlador = new $name();

$controlador->$op();