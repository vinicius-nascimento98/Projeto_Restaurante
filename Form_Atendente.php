<?php

	include("Class/ClassForm.php");
	include("Cabecalho/Cabecalho.php");

	echo "<h2> Cadastro de Atendente </h2>";
	
	$i1 = array("label"=>"Nome do Atendente", "nome"=>"nome", "tipo"=>"text", "id"=>"nome", "required"=>true);
	
	$input1 = new Input($i1);
	
	$i2 = array("label"=>"Comissão", "nome"=>"comissao", "tipo"=>"number", "id"=>"comissao", "required"=>true ,"pos_label"=>" % ");

	$input2 = new Input($i2);
	
	$f = array("nome"=>"form1", "action"=>"Cadastro_Atendente.php", "method"=>"post", "pos_label"=>"%");
	
	$form = new Form($f);
	
	$form->add_input($input1);
	$form->add_input($input2);
	
	$form->exibe_form();
?>