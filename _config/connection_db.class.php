<?php
define('HOST','localhost');
define('DBNAME','bancoteste');
define('CHARSET','utf8');
define('USER','root');
define('PWD','');

class ConnectionDB{
	//atributo de instancia
	private static $pdo = null;

	private function __construct(){}

	public static function getInstance(){
		if(!isset(self::$pdo)){
			try{
				$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',PDO::ATTR_PERSISTENT => TRUE);
				self::$pdo = new PDO("mysql:host=".HOST."; dbname=".DBNAME."; charset=".CHARSET.";",USER,PWD,$options);
			}catch(PDOException $e){
				print "Error: ".$e->getMessage();
			}
		}
		return self::$pdo;
	}
}

?>