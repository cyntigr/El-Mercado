<?php
/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */
require_once "libs/Database.php";

class Puesto{

    private $idPuesto;
    private $nombre;
    private $telefono;
    private $foto;
    private $idUsuario;
    private $infoPuesto;

    /**
     * Get the value of idPuesto
     */ 
    public function getIdPuesto()
    {
        return $this->idPuesto;
    }

    /**
     * Set the value of idPuesto
     *
     * @return  self
     */ 
    public function setIdPuesto($idPuesto)
    {
        $this->idPuesto = $idPuesto;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of infoPuesto
     */ 
    public function getInfoPuesto()
    {
        return $this->infoPuesto;
    }

    /**
     * Set the value of infoPuesto
     *
     * @return  self
     */ 
    public function setInfoPuesto($infoPuesto)
    {
        $this->infoPuesto = $infoPuesto;

        return $this;
    }

    /**
     * Busca todos los puestos del mercado
     */
    public function listarPuestos(){
        $conexion   = Database::getInstance();
        $sql        = "SELECT * FROM puesto";
        $parametros = [];
        $conexion->queryPdo($sql,$parametros);

        $listado = [];

        while($item = $conexion->getObject("Puesto")):
            array_push($listado,$item);
        endwhile;

        return $listado;
    }

    /**
     * Busca un puesto concreto de la base de datos
     * 
     * @param $id
     */
    public function buscarPuesto($id){
        $conexion   = Database::getInstance();
        $sql        = "SELECT * FROM puesto where idPuesto = ?";
        $parametros = [$id];
        $conexion->queryPdo($sql,$parametros);

        return $conexion->getObject("Puesto");
    }

    /**
     * Busca los puestos favoritos de un usuario
     *  @param $id
     */
    public function buscarFavoritos($id){
        $conexion   = Database::getInstance();
        $sql        = "SELECT P.* FROM puesto P 
		LEFT JOIN favorito F ON P.idPuesto = F.idPuesto LEFT JOIN
		usuario U ON F.idUsuario = U.idUsuario WHERE F.idUsuario = ?";
        $parametros = [$id];
        $conexion->queryPdo($sql,$parametros);
        $listado    = [];
        while($item = $conexion->getObject("Puesto")):
            array_push($listado,$item);
        endwhile;
        return $listado;
    }

    /**
     * Busca los puestos de un usuario
     *  @param $id
     */
    public function buscarPuestosUsuario($id){
        $conexion   = Database::getInstance();
        $sql        = "SELECT * FROM puesto WHERE idUsuario = ?";
        $parametros = [$id];
        $conexion->queryPdo($sql,$parametros);
        $listado    = [];
        while($item = $conexion->getObject("Puesto")):
            array_push($listado,$item);
        endwhile;
        return $listado;
    }


    /**
     * Crea un puesto nuevo
     * 
     */
    public function crearPuesto(){
        $conexion = Database::getInstance();
        $sql      = "INSERT INTO puesto (nombre,telefono,foto,IdUsuario,infoPuesto) ";
        $sql     .= "VALUES ( ?, ?, ?, ?, ?) ;";
        $parametros = [$this->nombre, $this->telefono, $this->foto, 
        $this->idUsuario, $this->infoPuesto];
        $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Edita un puesto en la base de datos
     * 
     */
    public function modificarPuesto():bool
        {
        $conexion = Database::getInstance();
        $sql      = "UPDATE puesto SET nombre = ?, telefono = ?, foto = ?, IdUsuario = ?, infoPuesto = ? 
        WHERE idPuesto = ? ";
        $parametros = [$this->nombre, $this->telefono, $this->foto, 
        $this->idUsuario, $this->infoPuesto, $this->idPuesto ];
        return $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Borra un puesto concreto de la base de datos
     * 
     */
    public function borrarPuesto($id){
        $conexion   = Database::getInstance();
        $sql        = "DELETE FROM puesto WHERE idPuesto = ?";
        $parametros = [$id];
        $conexion->queryPdo($sql,$parametros);
    }

}