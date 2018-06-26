<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
	include("Class/Model/ClassItem.php");
    include("Class/Model/ClassVinho.php");
    include("Class/View/ClassTable.php");
	include("Class/View/Form/ClassForm.php");
    include("Conexao.php");
    
    $table = "vw_vinho";
	
	$b = new BD($conn);
	
	$retorno_BD = $b->select($table);
	
	if($retorno_BD != null){
		//criando vetor de objetos
		foreach($retorno_BD as $v){
			$vinho[] = new Vinho($v);
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
<script src="Javascripts/funcoes.js"></script>
<script src="Javascripts/jquery-2.2.4.min.js"></script>