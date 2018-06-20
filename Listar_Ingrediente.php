<?php
	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassIngrediente.php");
    include("Class/View/ClassTable.php");
	include("Class/View/Form/ClassForm.php");
    include("Conexao.php");
	
	/* --------------------------- Inputs --------------------- */
	$inp1 = array('nome'=>'btnAlterar','tipo'=>'button', 'onclick'=>'alteraIngrediente()', 'value'=>'Alterar');
	
	$input1 = new Input($inp1); 
	
	$input1->imprime_tag();
	
	/*---------------------------- Select --------------------- */
	echo "<h3>Ingredientes</h3>";
    $table = "ingrediente";

    $b = new BD($conn);

    $retorno = $b->select($table);
    
	if($retorno != null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$ingrediente[] = new Ingrediente($v);
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
<script src="Javascripts/funcoes.js"></script>