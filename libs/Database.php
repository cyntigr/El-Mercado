<?php

use FFI\Exception;

/**
 * Clase Base datos para la conexión 
 * por Cintia García Ruiz
 * 2º DAW
 */
class Database
{
	private $host   = "localhost";
	private $dbName = "id12722771_mercado";
	private $dbUser = "id12722771_root";
	private $dbPass = "692227514/Cya";

	private $pdo = null;
	private $result = null;
	private static $instance = null;

	/** 
	 */
	private function __construct()
	{
		$this->connect();
	}


	public function exit()
	{
		$this->pdo = null;
	}

	/**
	 * Hacemos el método singleton 
	 * creamos una instancia de la base de datos 
	 *
	 * @param $dbu 
	 * @param $dbp
	 * @param $dbn
	 */
	public static function getInstance()
	{
		// si no existe instancia la creamos
		if (Database::$instance == null)
			Database::$instance = new Database();

		// devolvemos la instancia
		return Database::$instance;
	}

	/** 
	* Hacemos privado el método _CLONE para evitar clonaciones
	*/
	private function __clone()
	{ }

	/**
	 * Establece una conexión con la bases de datos en PDO
	 */
	private function connect()
	{
		try {

			$this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", "$this->dbUser", "$this->dbPass")
				or die("ERROR: Ha fallado la conexión, no se ha podido conectar a la base de datos.");
			$this->pdo->query("SET NAMES 'utf8';");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("ERROR::". $e->getMessage());
		}
	}

	/**
	 * Ejecutamos la consulta y comprobamos 
	 * el resultado
	 * 
	 * @param $sql
	 * @param $parametros
	 * @return 
	 */
	public function queryPdo($sql, $parametros, $emulate = false): bool
	{
		if ($emulate) $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		$this->result = $this->pdo->prepare($sql);
		try{
			$this->result->execute($parametros);
		}catch(PDOException $e){
			$this->result = false;
		}
		
		if (is_object($this->result))
			return ($this->result->rowCount() > 0);
		// si no es un objeto
		return $this->result;
	}

	/**
	 * Devuelve un objeto de la clase que le mandes
	 * $cls (tiene por defecto stdClass)
	 * @param $cls
	 * @return
	 */
	public function getObject($cls = "StdClass")
	{
		if (is_null($this->result)) return null;

		// si tenemos un resultado, lo devolvemos
		return $this->result->fetchObject($cls);
	}

	/**
	 */
	public function __wakeup()
	{
		$this->connect();
	}
}
