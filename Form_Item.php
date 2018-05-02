<?php
include('Cabecalho/Cabecalho.php'); //mudar para cabecalho geral
include('Class/ClassForm.php');

//input
$inp1 = array("label"=>"Descrição", "nome"=>"descricao", "tipo"=>"text");

$inp2 = array("label"=>"Preço", "nome"=>"custo", "tipo"=>"number");

$input1 = new Input($inp1);
$input2 = new Input($inp2);

//radio
$r1 = array("label"=>"Disponibilidade", "nome"=>"disponibilidade", "tipo"=>"radio");
$vetValueLabel = array('di'=>"Disponivel", 'in'=>"Indisponivel");

$r2 = array("label"=>"Tipo", "nome"=>"tipo", "tipo"=>"radio");
$vetValueLabel2 = array('drink'=>"Drink", 'prato'=>"Prato", 'vinho'=>"Vinho", 'bebida'=>"Bebida");

$r1 = new Radio($r1, $vetValueLabel);
$r2 = new Radio($r2, $vetValueLabel2);

//form
$f = array("nome"=>"Form_Item", "action"=>"Cadastro_Item.php", "method"=>"post");

$form = new Form($f);

$form->add_input($input1);
$form->add_input($input2);
$form->add_radio($r1);
$form->add_radio($r2);

$form->exibe_form();
?>