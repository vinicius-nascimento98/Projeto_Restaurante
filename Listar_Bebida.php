<?php

	include("Cabecalho/Cabecalho.php");
	include("Class/Control/ClassBD.php");
    include("Class/Model/ClassBebida.php");
    include("Class/View/ClassTable.php");
    include("Conexao.php");
    
    $table = "item_bebida";

    $b = new BD($conn);

    $retorno = $b->select($table);
    
	if($retorno!=null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$bebida[] = new Bebida($v);
		}

		//criando vetor de cabecalho
		foreach($retorno[0] as $i=>$v){
			$cabecalho[] = $i;
		}

		$t = new Table($cabecalho,$bebida);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}
?>