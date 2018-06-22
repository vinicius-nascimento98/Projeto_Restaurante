<?php

    //0 = false e 1 = true

    include("Class/View/Form/ClassForm.php");
    include("Class/Control/ClassBD.php");
    include("Conexao.php");
    include("Cabecalho/Cabecalho.php");

    if(empty($_POST)){
        $vetor_data = array('tipo'=>'date','nome'=>'data_hora','label'=>'Data Reserva','onchange'=>'document.data_reserva.submit()');
        $input_data = new Input($vetor_data);

        $vetor_form = array('nome'=>'data_reserva','method'=>'POST','action'=>'Form_Reserva.php');
        $form = new Form ($vetor_form);

        $form->add_input($input_data);
        $form->exibe_form();
    }
    else{

        $data_reserva =  $_POST['data_hora'];
        
        $b = new BD($conn);

        $table = array('nome'=>'vw_mesareservada','condicao'=> "data_hora = '".$data_reserva."'");

        //verificando no banco de dados se existem mesas reservadas para a data inserida
        $retornoMesasReservadas = $b->select($table);

        /*caso o valor retornado for vazio, significa que não ha reservas naquela data,
        sendo assim seta-se a variavel table para um futuro SELECT ALL*/
        if(empty($retornoMesasReservadas)){
            $table = "mesa";    
        }
        /*caso seja retornado valores, significa que a reservas naquela data, sendo assim
        é serado a variavel com as condições para um futuro SELECT NOT IN */
        else{
            $table = array('nome'=>'mesa','condicao'=>'id_mesa NOT IN ( ');

            //montando condição responsável por trazer as mesas disponíveis para reserva naquela data
            foreach($retornoMesasReservadas as $i=>$v){

                if($i==0){
                    $table['condicao'].= $v['cod_mesa'];
                }
                else{
                    $table['condicao'].= ','.$v['cod_mesa'];
                }
            }

            $table['condicao'].= ' )';
        }

        //dando SELECT no banco de acordo com a variavel table setada
        $retornoMesasLivres = $b->select($table);

        //se o retorno mesas for NULL o usuário é redirecionado ao cadastro de lista de espera, pois não ha mesas livres
        if($retornoMesasLivres == null){
                header("Location: Form_Lista_Espera.php?data_hora=$data_reserva");
        }
        //caso contrário é habilitado o cadastro de uma reserva
        else{

            echo "<h1>Cadastro Reserva</h1>";

            //criando objeto input oculto para passar situação da reserva
            $i_hidden = array("nome"=>"reserva_finalizada", "tipo"=>"hidden", "id"=>"reserva_finalizada","value"=>"0");
            $input_hidden = new Input($i_hidden);

            //criando objeto input 1
            $i1 = array("label"=>"Cliente", "nome"=>"nome_cliente", "tipo"=>"text", "id"=>"campo_nome","required"=>true);
            $input1 = new Input($i1);

            //criando objeto input 2
            $i2 = array("label"=>"Tel.", "nome"=>"telefone", "tipo"=>"text", "id"=>"campo_telefone","required"=>true);
            $input2 = new Input($i2);

            //criando objeto input 3
            $i3 = array("label"=>"Data", "nome"=>"data_hora", "tipo"=>"date", "id"=>"campo_data","required"=>true,"value"=>"$data_reserva");
            $input3 = new Input($i3);

             //criando objeto input 4
            $i4 = array("label"=>"Quantidade de pessoas", "nome"=>"qtd_pessoas", "tipo"=>"number", "id"=>"qtd_pessoa","required"=>true,"value"=>'1');
            $input4 = new Input($i4);

            //criando objeto input 3 que sera hidden contendo a inicialização da mesa para cadastrar no banco de dados
            $i5 = array("nome"=>"mesa_iniciada", "tipo"=>"hidden", "id"=>"mesa_iniciada","value"=>"1");
            $input5 = new Input($i5);

            $table = "atendente";
            $atendentes = $b ->  select($table);

            //criando vetor de options
            $opt1[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
            foreach($retornoMesasLivres as $v){
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
            $form->add_input($input_hidden);
            $form->add_input($input1);
            $form->add_input($input2);
            $form->add_input($input3);
            $form->add_input($input4);
            $form->add_input($input5);
            $form->add_select($s);
            $form->add_select($s2);

            //imprimindo o form
            $form->exibe_form();
        }
    }
?>