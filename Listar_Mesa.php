<?php

	include("Cabecalho/Cabecalho.php"); //mudar para cabecalho geral
	include("Class/ClassBD.php");
	include("Class/ClassMesa.php");
	include("Class/ClassTable.php");
	include("Conexao.php");
	
	$table = "mesa";
	
	$b = new BD($conn);
	
	$retorno_BD = $b->select($table);
	
	if($retorno_BD != null){
		//criando vetor de objetos
		foreach($retorno_BD as $v){
			$mesa = new Mesa($v);
		}
		
		//criando vetor de cabecalho
		foreach($retorno_BD[0] as $i=>$v){
			$cabecalho[] = $i;
		}
		
		$t = new Table($cabecalho,$mesa);
		
	}
	
	else{
		echo "<h1>Não possui DADOS!!</h1>";
	}
	
?>