<?php

	include("Class/View/Form/ClassForm.php");
	include("Cabecalho/Cabecalho.php");

	echo "<h2> Cadastro de Mesa </h2>";
	
	
	$f = array("nome"=>"form1", "action"=>"Cadastro_Mesa.php", "method"=>"post");
	
	$form = new Form($f);
	
	echo "Confirma nova mesa? ";
	
	$form->exibe_form();
?>