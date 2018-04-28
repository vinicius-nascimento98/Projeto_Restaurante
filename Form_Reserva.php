<?php

    include("Class/ClassForm.php");
    include("funcoes.php"); //mudar para conceito orientação objeto
    include("Conexao.php");
    include("Cabecalho/Cabecalho.php"); //mudar para cabecalho geral

    echo "<h1>Cadastro Reserva</h1>";

    //criando objeto input 1
    $i1 = array("label"=>"Cliente", "nome"=>"nome_cliente", "tipo"=>"text", "id"=>"campo_nome","required"=>true);
    $input1 = new Input($i1);

    //criando objeto input 2
    $i2 = array("label"=>"Tel.", "nome"=>"telefone", "tipo"=>"text", "id"=>"campo_telefone","required"=>true);
    $input2 = new Input($i2);

    //criando objeto input 3
    $i3 = array("label"=>"Data", "nome"=>"data_reserva", "tipo"=>"date", "id"=>"campo_data","required"=>true);
    $input3 = new Input($i3);

    //chamada de funções para busca das informações no banco de dados
    $nome_atendentes = busca_atendente($conn);
    $mesas = busca_mesa($conn,true);

    //instanciando os objetos options para listar as mesas
    $cont=0;
    foreach($mesas as $v){
        $o[$cont] = new Option($v);

        $cont++;
    }

    //instanciando os objetos options para listar os atendentes
    $cont=0;
    foreach($nome_atendentes as $v){
        $o2[$cont] = new Option($v);

        $cont++;
    }

    //instanciando o objeto select passando os objetos option de mesas
    $select = array("nome"=>"mesas", "label"=>"Mesas");
    $s = new Select($select, $o);

    //instanciando o objeto select passando os objetos option de atendentes
    $select2 = array("nome"=>"atendente", "label"=>"Atendente");
    $s2 = new Select($select2, $o2);

    //criando o form
    $f = array("nome"=>"cadastro_reserva", "action"=>"cadastro_BD_reserva.php", "method"=>"post");
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