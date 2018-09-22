<?php

require_once "../_config/connection_db.class.php";
class Pessoa{
	private $_db; 
	private $sql;

	public function __construct(){
		$this->_db = ConnectionDB::getInstance();
	}
	protected function setSql($sql_query){
		return isset($sql_query) ? $this->sql = $sql_query : false;
	}

	/*
		Espera receber um array como parâmetro
	*/
	public function insert($id,$nome,$sobrenome,$idade,$nasc){
	//insert into PESSOAS (id, nome,sobrenome,idade) values (?,?,?,?)
		$this->setSql("insert into PESSOAS(id, nome,sobrenome,idade,dt_nascimento) values (?,?,?,?,?)");
		$query  = $this->_db->prepare($this->sql);
		$query->bindValue(1,$id);
		$query->bindValue(2,$nome);
		$query->bindValue(3,$sobrenome);
		$query->bindValue(4,$idade);
		$query->bindValue(5,$nasc);

		try{
			$query->execute() or die(var_dump($query));
			return true;
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function getById($id){
		$query = $this->_db->prepare($this->sql);
		$query->bindValue(1,$id);

		try{
			$query->execute();
			return $query->fetch(PDO::FECTH_OBJ);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function find($term){
		$query  = $this->_db->prepare($this->sql);
		$query->bindValue(1,$term);

		try{
			$query->execute();
			return $query->fetch(PDO::FECTH_OBJ);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}

?>