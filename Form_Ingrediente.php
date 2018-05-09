<?php

include('Cabecalho/Cabecalho.php'); //mudar cabecalho geral
include('Class/ClassForm.php');

$inp1 = array("label"=>"Nome", "nome"=>"nome_ingrediente", "tipo"=>"text", "id"=>"ingrediente");

$inp2 = array("label"=>"Custo", "nome"=>"custo", "tipo"=>"number", "id"=>"custo", "step"=>"0.01", "required"=>true);

$inp3 = array("label"=>"Estoque", "nome"=>"estoque", "tipo"=>"number", "id"=>"estoque");

$input1 = new Input($inp1);
$input2 = new Input($inp2);
$input3 = new Input($inp3);

$f = array("nome"=>"form_ingrediente", "action"=>"Cadastro_Ingrediente.php", "method"=>"post");

$form = new Form($f);

$form->add_input($input1);
$form->add_input($input2);
$form->add_input($input3);

$form->exibe_form();
?>