<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassBebida.php");
    include("Class/View/ClassTable.php");
    include("Conexao.php");
    
    $table = "item_vinho";
	
	$b = new BD($conn);
	
	$retorno_BD = $b->select($table);
	
	if($retorno_BD != null){
		//criando vetor de objetos
		foreach($retorno_BD as $v){
			$vinho = new Vinho($v);
		}
		
		//criando vetor de cabecalho
		foreach($retorno_BD[0] as $i=>$v){
			$cabecalho[] = $i;
		}
		
		$t = new Table($cabecalho,$vinho);
		
	}
	
	else{
		echo "<h1>Não possui DADOS!!</h1>";
	}
	
?>