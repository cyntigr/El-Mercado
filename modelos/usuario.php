<?php 

/**
 * Cintia Garcia Ruiz
 * 2º DAW
 */

require_once "libs/Database.php";

/**
 * Clase usuario
 */
class Usuario{

    private $idUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $idTipo;
    private $telefono;
    private $foto;
    private $apiKey;
    private $solicitaVendedor;

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
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of idTipo
     */ 
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set the value of idTipo
     *
     * @return  self
     */ 
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

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
     * Get the value of apiKey
     */ 
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set the value of apiKey
     *
     * @return  self
     */ 
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    
    /**
     * Get the value of solicitaVendedor
     */ 
    public function getSolicitaVendedor()
    {
        return $this->solicitaVendedor;
    }

    /**
     * Set the value of solicitaVendedor
     *
     * @return  self
     */ 
    public function setSolicitaVendedor($solicitaVendedor)
    {
        $this->solicitaVendedor = $solicitaVendedor;

        return $this;
    }

    /**
     * Busca un usuario por su id
     * 
     * @param $id
     */
    public function buscarUsuario($id){

        $conexion = Database::getInstance();

        $sql = "select * from usuario where idUsuario = ?";
        $param = [$id];
        $conexion->queryPdo($sql,$param);

        return $conexion->getObject("Usuario");
    }

    /**
     * Busca un usuario por su Api
     * 
     * @param $api
     */
    public function buscarUsuarioApi($api){

        $conexion = Database::getInstance();

        $sql = "select * from usuario where apiKey = ?";
        $param = [$api];
        $conexion->queryPdo($sql,$param);

        return $conexion->getObject("Usuario");
    }

    /**
     * Añade un usuario nuevo a la base de datos
     *
     */
    public function guardarUsuario():bool
    {
        $conexion = Database::getInstance();

        $sql = "INSERT INTO usuario (nombre,apellido,email,password,idTipo,telefono,foto,solicitaVendedor) ";
        $sql .= "VALUES ( ?, ?, ?, md5(?),?, ?, ?,?) ;";
        $parametros = [$this->nombre, $this->apellido, $this->email, 
        $this->password, $this->idTipo, $this->telefono, $this->foto,$this->solicitaVendedor];
        return $conexion->queryPdo($sql,$parametros);
    }


    /**
     * Borra un usuario de la base de datos
     * 
     * @param $id
     */
    public function borrarUsuario($id){
        $conexion = Database::getInstance();
        $sql = "DELETE FROM USUARIO WHERE idUsuario = ?";
        $parametros = [$id];
        $conexion->queryPdo($sql,$parametros);
    }


    /**
     * Modifica un usuario de la base de datos
     */
    public function modificarUsuario():bool
    {
        $conexion = Database::getInstance();

        $sql = "UPDATE usuario SET nombre = ?,apellido = ?,email = ?,telefono = ?,foto = ? ";
        $sql .= " WHERE idUsuario = ? ;";
        $parametros = [$this->nombre, $this->apellido, $this->email, $this->telefono, $this->foto, $this->idUsuario];
        return $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Añade un puesto a los favoritos de un usuario
     * 
     * @param $idUsu
     * @param $idPuesto
     */
    public function guardarFavorito($idUsu,$idPuesto){
        $conexion = Database::getInstance();
        $sql ="INSERT INTO favorito (idUsuario,idPuesto) VALUES(?,?)";
        $parametros = [$idUsu,$idPuesto];
        $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Busca una relacion de favoritos en la tabla favoritos
     */
    public function buscarFavorito($idUsu,$idPuesto):bool
    {
        $conexion = Database::getInstance();
        $sql ="SELECT * FROM favorito WHERE idUsuario = ? AND idPuesto = ?";
        $parametros = [$idUsu,$idPuesto];
        return $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Borra un puesto de favoritos
     * 
     * @param $idUsuario
     * @param $idPuesto
     */
    public function borrarFavorito($idUsu,$idPuesto){
        $conexion = Database::getInstance();
        $sql ="DELETE FROM favorito WHERE idUsuario = ? AND idPuesto = ?";
        $parametros = [$idUsu,$idPuesto];
        $conexion->queryPdo($sql,$parametros);
    }

    /**
     * Comprobar usuario en el login
     * 
     * @param $email
     * @param $contrasena
     * 
     */
    public function logueo($email,$contrasena){

        $conexion = Database::getInstance();
        $sql = "select * from usuario where email = ? and password = MD5(?)";
        $parametros = [$email,$contrasena];
        $conexion->queryPdo($sql,$parametros);
        return $conexion->getObject("Usuario");
    }

    function creaApiKey($id) { 
        $length = 32;
        $conexion = Database::getInstance();
        $api = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $sql = "UPDATE usuario SET apiKey = ? WHERE idUsuario = ? ;";
        $parametros = [$api,$id];
        $conexion->queryPdo($sql,$parametros);
        return ;
    }
}