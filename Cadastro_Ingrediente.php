<?php

	if(!empty($_POST)){
		include("Cabecalho/Cabecalho.php");
		include("Class/Control/ClassBD.php");
		include("Conexao.php");
		
		$i = new BD($conn);
		
		$i->insert($_POST, "ingrediente");
		
		echo "<br/>";
		echo "Ingrediente cadastrado com sucesso!";
		
	}
	else{
		header("location: Form_Ingrediente.php");
	}
?>