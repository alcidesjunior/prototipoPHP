<?php
require_once "../controller/pessoas.class.php";

$p = new Pessoas();

$alcides = $p->create(NULL,"Alcides","Junior",'24',"14/08/1994");
if($alcides){
	print("inserido com sucesso");
}else{
	print("deu erro.");
}
?>