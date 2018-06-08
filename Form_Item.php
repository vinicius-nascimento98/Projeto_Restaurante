<?php
include('Cabecalho/Cabecalho.php'); //mudar para cabecalho geral
include("Class/View/Form/ClassForm.php");
include("Class/View/Classse");
include("Javascripts/onchange_item.js");

 echo "<h1>Cadastro Item</h1>";

//input
$inp1 = array("label"=>"Descrição", "nome"=>"descricao", "tipo"=>"text");

$inp2 = array("label"=>"Preço", "nome"=>"custo", "tipo"=>"number");

$input1 = new Input($inp1);
$input2 = new Input($inp2);

//radio
$r1 = array("label"=>"Disponibilidade", "nome"=>"disponibilidade", "tipo"=>"radio");
$vetValueLabel = array('di'=>"Disponivel", 'in'=>"Indisponivel");

//adicionar onchange.
$r2 = array("label"=>"Tipo", "nome"=>"tipo", "	"=>"radio");
$vetValueLabel2 = array('Drink'=>"Drink", 'Prato'=>"Prato", 'Vinho'=>"Vinho", 'Bebida'=>"Bebida");

$r1 = new Radio($r1, $vetValueLabel);
$r2 = new Radio($r2, $vetValueLabel2);

// Utilizar para tipo de ITem
$inputBebida = array("label"=>"Estoque", "nome"=>"estoque", "tipo"=>"number", "value"=>"bebida", "onchange"=>"habilita_div(this)");

//form
$f = array("nome"=>"Form_Item", "action"=>"Cadastro_Item.php", "method"=>"post");

$form = new Form($f);

$form->add_input($input1);
$form->add_input($input2);
$form->add_radio($r1);
$form->add_radio($r2);

$form->exibe_form();
?>
<script src = "Javascripts/jquery-2.2.4.min.js"></script>
<script src = "Javascripts/onchange_item.js"></script>