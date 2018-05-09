<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/ClassBD.php");
    include("Class/ClassIngrediente.php");
    include("Class/ClassTable.php");
    include("Conexao.php");
    
    $table = "ingrediente";

    $b = new BD($conn);

    $retorno = $b->select($table);
    
	if($retorno != null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$ingrediente[] = new Ingrediente($v);
			print_r($v);
		}

		//criando vetor de cabecalho
		foreach($retorno[0] as $i=>$v){
			$cabecalho[] = $i;
		}

		$t = new Table($cabecalho,$ingrediente);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}
?>