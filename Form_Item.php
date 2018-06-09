<?php
include('Cabecalho/Cabecalho.php'); //mudar para cabecalho geral
include("Class/View/Form/ClassForm.php");
include("Class/View/ClassDiv.php");

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
$r2 = array("label"=>"Tipo", "nome"=>"tipo", "tipo"=>"radio","onchange"=>"habilita_div(this)");
$vetValueLabel2 = array('Drink'=>"drink", 'Prato'=>"prato", 'Vinho'=>"vinho", 'Bebida'=>"bebida");

$r1 = new Radio($r1, $vetValueLabel);
$r2 = new Radio($r2, $vetValueLabel2);

/*-------------------------------------*/

//Criando Div Bebida.
$atributos_bebida = array("class"=>"bebida", "id"=>"bebida");

//input(vetor) quando habilitar bebida. 
$vetBebida = array("label"=>"Estoque", "nome"=>"estoque", "tipo"=>"number");
//Input item bebida.
$inputBebida = new Input($vetBebida);
$vetor_obj_div_bebida[0] = $inputBebida;
$div_inputBebida = new Div($vetor_obj_div_bebida,$atributos_bebida);

/*-------------------------------------*/
//Criando Div Vinho.
$atributos_vinho = array("class"=>"vinho", "id"=>"vinho");

//input(vetor) quando habilitar vinho.
$vetVinho1 = array("label"=>"Estoque", "nome"=>"estoque", "tipo"=>"number");
$vetVinho2 = array("label"=>"Tipo Uva", "nome"=>"tipoUva", "tipo"=>"text");
$vetVinho3 = array("label"=>"Safra", "nome"=>"safra", "tipo"=>"number");

//Input item Vinho.
$inputVinho = new Input($vetVinho1);
$inputVinho2 = new Input($vetVinho2);
$inputVinho3 = new Input($vetVinho3);

$vetor_obj_div_vinho[] = $inputVinho;
$vetor_obj_div_vinho[] = $inputVinho2;
$vetor_obj_div_vinho[] = $inputVinho3;

$div_inputVinho = new Div($vetor_obj_div_vinho, $atributos_vinho);

/*-------------------------------------*/
//Criando Div Prato e Drink.
$atributos_pratoDrink = array("class"=>"pratoDrink", "id"=>"pratoDrink");

//input(vetor) quando habilitar prato e drink.
$vetPratoDrink1 = array("label"=>"Nome", "nome"=>"nome", "tipo"=>"text");


	


//form
$f = array("nome"=>"Form_Item", "action"=>"Cadastro_Item.php", "method"=>"post");

$form = new Form($f);

$form->add_input($input1);
$form->add_input($input2);
$form->add_radio($r1);
$form->add_radio($r2);
$form->add_div($div_inputBebida);
$form->add_div($div_inputVinho);

$form->exibe_form();
?>
<link rel="Stylesheet" href="Stylesheets/onchange_item.css">
<script src = "Javascripts/jquery-2.2.4.min.js"></script>
<script src = "Javascripts/onchange_item.js"></script>