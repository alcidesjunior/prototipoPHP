<?php
require_once "../controller/pessoas.class.php";



function cria(){
	$p = new Pessoas();
	$pessoas = [
		"pessoas"=>[
			0=>["nome"=>"Alcides","sobrenome"=>"Junior","idade"=>"24","nasc"=>"1994-08-14"],
			1=>["nome"=>"Marcos","sobrenome"=>"Feitosa","idade"=>"18","nasc"=>"1997-08-14"],
			2=>["nome"=>"David","sobrenome"=>"Mendes","idade"=>"26","nasc"=>"1992-08-14"]
		]
	];

	foreach ($pessoas as $pessoa) {
		foreach ($pessoa as $key) {
			if($p->create($key['nome'],$key['sobrenome'],$key['idade'],$key['nasc']) ){
				print("Pessoa criada! <br>");
			}else{
				print("Erro ao inserir<br>");
			}
		}
	}
}
function lista(){
	$p = new Pessoas();
	$pessoas = $p->getAll();
	foreach ($pessoas as $pessoa) {
		print("<b>NOME:</b> ".$pessoa->nome." ".$pessoa->sobrenome."<br>");
		print("<b>IDADE:</b> ".$pessoa->idade."<br>");
		print("<b>DATA DE NASCIMENTO:</b> ".date('d/m/Y',strtotime($pessoa->dt_nascimento))."<br>");
	}
}
// cria();
lista();
?>