<?php

	if(!empty($_POST)){
		include("Cabecalho/Cabecalho.php");
		include("Class/Control/ClassBD.php");
		include("Conexao.php");

		$item = new BD($conn);
		
		$item->insert($_POST, "item");
		
		echo "<br />";
		echo "Item cadastrado com sucesso!!";
		
	}
	else{
		header("location: Form_Item.php");
	}

?>