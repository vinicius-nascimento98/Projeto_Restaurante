<?php

	if(!empty($_POST)){
		include("Cabecalho/Cabecalho.php");
		include("Class/Control/ClassBD.php");
		include("Conexao.php");

		$m = new BD($conn);
		
		$m->insert($_POST, "mesa");
		
		echo "<br />";
		echo "Mesa cadastrada com sucesso!!";
		
	}
	else{
		header("location: Form_Mesa.php");
	}
	
?>




