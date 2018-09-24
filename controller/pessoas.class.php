<?php
require_once "../model/pessoa.class.php";
class Pessoas{
	private $pessoa;

	public function __construct(){
		$this->pessoa = new Pessoa();
	}

	public function getAll(){
		return $this->pessoa->getAll();
	}
	public function show(){}
	public function create($nome,$sobrenome,$idade,$nasc){
		$dt = $this->pessoa->insert($nome,$sobrenome,$idade,$nasc);
		return ($dt ? true : false);
	}
	public function update(){}
	public function destroy(){}
}

?>