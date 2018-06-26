<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassAtendente.php");
    include("Class/View/ClassTable.php");
    include("Conexao.php");
    
    $table = "atendente";

    $b = new BD($conn);

    $retorno = $b->select($table);
    
	if($retorno!=null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$a[] = new Atendente($v);
		}

		//criando vetor de cabecalho
		foreach($retorno[0] as $i=>$v){
			$cabecalho[] = $i;
		}

		$t = new Table($cabecalho,$a);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}
?>