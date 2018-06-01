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
    $vetor_obj[] = $i; //adicionando ao vetor de objetos

    //criando o segundo input
    $input2 = array("tipo"=>"number","nome"=>"idade");
    $i2 = new Input($input2);
    $vetor_obj[] = $i2; //adicionando ao vetor de objetos

    //criando um vetor de atributos que sera utilizado pela DIV
    $atributos = array("class"=>"form-group col-xs-12");

    /*criando o objeto DIV e passando como parametros os
    inputs e os atributos da DIV criados anteriormente*/
    $d = new Div($vetor_obj,$atributos);
    
    $d->imprime_tag();
?>

<!--incluindo o js do jquery e do bootstrap-->
<script src='Javascripts/jquery-2.2.4.min.js' type='text/javascript'></script>
<script src="Javascripts/bootstrap.min.js"></script>