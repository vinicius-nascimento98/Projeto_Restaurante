<?php

include('Cabecalho/Cabecalho.php'); //mudar cabecalho geral
include("Class/View/Form/ClassForm.php");

	echo "<h2> Cadastro de Ingrediente </h2>";


$inp1 = array("label"=>"Nome", "nome"=>"nome_ingrediente", "tipo"=>"text", "id"=>"ingrediente");

$inp2 = array("label"=>"Custo", "nome"=>"custo", "tipo"=>"number", "id"=>"custo", "step"=>"0.01", "required"=>true,"pos_label"=>" R$ ");

$inp3 = array("label"=>"Estoque", "nome"=>"estoque", "tipo"=>"number", "id"=>"estoque");

$input1 = new Input($inp1);
$input2 = new Input($inp2);
$input3 = new Input($inp3);

/* ------------SELECT---------------- */

$op1 = array ("value"=>"l", "texto"=>"L");
$op2 = array ("value"=>"ml", "texto"=>"Ml");
$op3 = array ("value"=>"kg", "texto"=>"Kg");
$op4 = array ("value"=>"g", "texto"=>"G");
$op5 = array ("value"=>"un", "texto"=>"Un");
$op6 = array ("value"=>"cx", "texto"=>"Cx");
$op7 = array ("value"=>"gl", "texto"=>"Gl");

$o1 = new Option($op1);
$o2 = new Option($op2);
$o3 = new Option($op3);
$o4 = new Option($op4);
$o5 = new Option($op5);
$o6 = new Option($op6);
$o7 = new Option($op7);

$vetOption = array ($o1, $o2, $o3, $o4, $o5, $o6, $o7);

$s1 = array("label"=>"Unidade", "nome"=>"unid");

$s = new Select($s1,$vetOption);

$s->add_option($o1);
$s->add_option($o2);
$s->add_option($o3);
$s->add_option($o4);
$s->add_option($o5);
$s->add_option($o6);
$s->add_option($o7);

$f = array("nome"=>"form_ingrediente", "action"=>"Cadastro_Ingrediente.php", "method"=>"post");

$form = new Form($f);

$form->add_input($input1);
$form->add_input($input2);
$form->add_input($input3);
$form->add_select($s);

$form->exibe_form();
?>