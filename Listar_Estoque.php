<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassIngrediente.php");
    include("Class/Model/ClassBebida.php");
    include("Class/Model/ClassVinho.php");
    include("Class/View/ClassTableEstoque.php");
    include("Conexao.php");
    
	
	/* -----------------------------Ingrediente----------------------------------------------- */
    //echo "<h3>Estoque Ingrediente</h3>" ;
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

		$t = new TableEstoque($cabecalho,$ingrediente);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui INGREDIENTE!!</h1>";
	}
	
	/* --------------------------------Vinho-------------------------------------------------- */
	//echo "<h3>Estoque Vinho</h3>" ;
	$table = "vw_vinho_estoque";

    $retorno = $b->select($table);
    
	if($retorno != null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$vinho[] = new Vinho($v);
		}

		//criando vetor de cabecalho
		foreach($retorno[0] as $i=>$v){
			$cabecalho[] = $i;
		}

		$t = new TableEstoque($cabecalho,$vinho);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui VINHO!!</h1>";
	}
	
	/* -----------------------------------Bebida-------------------------------------------- */
	//echo "<h3>Estoque Bebida</h3>" ;
	$table = " vw_bebida_estoque";

    $retorno = $b->select($table);
    
	if($retorno != null){
		//criando vetor de objetos
		foreach($retorno as $v){
			$bebida[] = new Bebida($v);
		}

		//criando vetor de cabecalho
		foreach($retorno[0] as $i=>$v){
			$cabecalho[] = $i;
		}

		$t = new TableEstoque($cabecalho,$bebida);

		//get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
	}
	else{
		echo"<h1>Não possui BEBIDAS!!</h1>";
	}
?>