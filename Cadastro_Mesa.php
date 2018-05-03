<?php

	if(!empty($_POST)){
		
		include("Cabecalho/Cabecalho.php");
		include('Conexao.php');

	$insert = "INSERT INTO mesa (id_mesa) values (null);";

	$stmt = $conn->prepare($insert);


	$stmt->execute();

	echo "Mesa cadastrada com sucesso!";

	}
	else{
		header("location: Form_Mesa.php");
	}
	
?>