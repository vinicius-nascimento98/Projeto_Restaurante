<!--incluindo o css do bootstrap e adaptação
da viewport de acordo com o dispositivo-->
<link rel="stylesheet" href="Stylesheets/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php

    //incluindo a classe da div e do form
    include("Class/View/Form/ClassForm.php");
    include("Class/View/ClassDiv.php");

    //criando o primeiro input
    $input = array("tipo"=>"text","nome"=>"nome");
    $i = new Input($input);
    $vetor_obj1[0] = $i; //adicionando ao vetor de objetos

    //criando um vetor de atributos que sera utilizado pela DIV
    $atributos = array("class"=>"input-group");
    $d_input1 = new Div($vetor_obj1,$atributos);
    $vetor_obj_div[0] = $d_input1;

    //colocando a DIV dentro de outra div
    $atributos = array("class"=>"form-group");
    $d1 = new Div($vetor_obj_div,$atributos);

    
?>

<!--incluindo o js do jquery e do bootstrap-->
<script src='Javascripts/jquery-2.2.4.min.js' type='text/javascript'></script>
<script src="Javascripts/bootstrap.min.js"></script>