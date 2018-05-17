<?php

    include("Class/View/Form/ClassForm.php");
	include("Class/Control/ClassBD.php");
    include("Conexao.php");
    include("Cabecalho/Cabecalho.php");

    echo "<h1>Cadastro Lista de Espera</h1>";

    //criando objeto input 1
    $i1 = array("label"=>"Cliente", "nome"=>"nome_cliente", "tipo"=>"text", "id"=>"campo_nome","required"=>true);
    $input1 = new Input($i1);

    //criando objeto input 2
    $i2 = array("label"=>"Ordem", "nome"=>"ordem", "tipo"=>"number", "id"=>"campo_ordem","required"=>true);
    $input2 = new Input($i2);

    //criando objeto input 3
    $i3 = array("label"=>"Data", "nome"=>"data_espera", "tipo"=>"date", "id"=>"campo_data","required"=>true);
    $input3 = new Input($i3);

    //criando objeto input 4
    $i4 = array("label"=>"Tel.", "nome"=>"telefone", "tipo"=>"text", "id"=>"campo_telefone","required"=>true);
    $input4 = new Input($i4);

    $a = new BD($conn);
    $table = "atendente"; 

    $nome_atendentes = $a->select($table);

    //criando vetor de options
    $opt[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
    foreach($nome_atendentes as $v){
        $opt[]= array("valor"=>$v['id_atendente'],"texto"=>$v['nome']);
    }

    //instanciando os objetos options
    foreach($opt as $v){
        $o[]= new Option($v);
    }

    //instanciando o objeto select passando os objetos option acima
    $select = array("nome"=>"cod_atendente", "label"=>"Atendente");
    $s = new Select($select, $o);

    //criando o form
    $f = array("nome"=>"cadastro_lista_espera", "action"=>"Cadastro_Lista_Espera.php", "method"=>"post");
    $form = new Form($f);

    //adicionando os objetos input 1 e um textarea 1
    $form->add_input($input1);
    $form->add_input($input2);
    $form->add_input($input3);
    $form->add_input($input4);
    $form->add_select($s);
    

    //imprimindo o form
    $form->exibe_form();

?>