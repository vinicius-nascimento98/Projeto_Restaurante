<?php
	include("Cabecalho/Cabecalho.php");
	include("Class/ClassBD.php");
	
	if(!empty($_POST)){
		include("Conexao.php");

		$a = new BD($conn);

		$a->insert($_POST,"atendente");

		echo "<br/>";
		echo "Atendente Cadastrado com Sucesso";
		
		//echo "<br /> <a href='Form_CadastroAtendente.php'> Cadastrar novo Atendente </a>";
	}	
	else{
		header("location: Form_Atendente.php");
	}

?>