<?php

    include("Class/View/Form/ClassForm.php");
    include("Class/Control/ClassBD.php");
    include("Conexao.php");
    include("Cabecalho/Cabecalho.php");

    echo "<h1>Cadastro Reserva</h1>";

    //criando objeto input 1
    $i1 = array("label"=>"Cliente", "nome"=>"nome_cliente", "tipo"=>"text", "id"=>"campo_nome","required"=>true);
    $input1 = new Input($i1);

    //criando objeto input 2
    $i2 = array("label"=>"Tel.", "nome"=>"telefone", "tipo"=>"text", "id"=>"campo_telefone","required"=>true);
    $input2 = new Input($i2);

    //criando objeto input 3
    $i3 = array("label"=>"Data", "nome"=>"data_hora", "tipo"=>"date", "id"=>"campo_data","required"=>true);
    $input3 = new Input($i3);

    $b = new BD($conn);
    
    $table = "mesa";
    $mesas = $b ->  select($table);

    $table = "atendente";
    $atendentes = $b ->  select($table);

    //criando vetor de options
    $opt1[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
    foreach($mesas as $v){
        $opt1[]= array("texto"=>$v['id_mesa']);
    }

    //instanciando os objetos options
    foreach($opt1 as $v){
        $o[]= new Option($v);
    }

    //criando vetor de options
    $opt[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
    foreach($atendentes as $v){
        $opt[]= array("valor"=>$v['id_atendente'],"texto"=>$v['nome']);
    }

    //instanciando os objetos options
    foreach($opt as $v){
        $o2[]= new Option($v);
    }

    //instanciando o objeto select passando os objetos option de mesas
    $select = array("nome"=>"cod_mesa", "label"=>"Mesas");
    $s = new Select($select, $o);

    //instanciando o objeto select passando os objetos option de atendentes
    $select2 = array("nome"=>"cod_atendente", "label"=>"Atendente");
    $s2 = new Select($select2, $o2);

    //criando o form
    $f = array("nome"=>"cadastro_reserva", "action"=>"Cadastro_Reserva.php", "method"=>"post");
    $form = new Form($f);

    //adicionando os objetos input 1 e um textarea 1
    $form->add_input($input1);
    $form->add_input($input2);
    $form->add_input($input3);
    $form->add_select($s);
    $form->add_select($s2);

    //imprimindo o form
    $form->exibe_form();

?>