<?php

	include("Class/View/Form/ClassForm.php");
	include("Cabecalho/Cabecalho.php");

	echo "<h2> Cadastro de Mesa </h2>";
	
	$i = array("nome"=>"id_mesa","tipo"=>"hidden");
	
	$input = new Input($i);
	
	$f = array("nome"=>"form1", "action"=>"Cadastro_Mesa.php", "method"=>"post");
	
	$form = new Form($f);
	
	$form->add_input($input);
	
	echo "Confirma nova mesa? ";
	
	$form->exibe_form();
?>