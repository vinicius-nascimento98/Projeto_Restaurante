<?php

	if(!empty($_POST)){
		include("Cabecalho/Cabecalho.php");
		include("Class/ClassBD.php");
		include("Conexao.php");

		$item = new BD($conn);
		
		$item->insert($_POST, "mesa");
		
		echo "<br />";
		echo "Mesa cadastrada com sucesso!!";
		
	}
	else{
		header("location: Form_Mesa.php");
	}

?>




