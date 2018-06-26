<?php

    include("Class/View/Form/ClassForm.php");
    include("Cabecalho/Cabecalho.php");
    include("Conexao.php");
    include("Class/Control/ClassBD.php");

    //setando o fuso da função date
    date_default_timezone_set('America/Sao_Paulo');
    $data_hora = date('Y-m-d');

    //caso ele foi redirecionado pela tela de iniciar mesa
    if(isset($_GET['id_reserva'])){
        
        $msg_mesa = "Mesa Iniciada"; //variável auxiliar de mensagem
        $id_reserva = $_GET['id_reserva'];

        //setando variavel para mostrar apenas uma mesa para o usuário
        $select['nome'] = "reserva";
        $select['condicao'] = "id_reserva = $id_reserva";
    
    }
    //caso contrário sera mostrada todas as mesas iniciadas naquele dia
    else{

        $msg_mesa = "Mesas Iniciadas"; //variável auxiliar de mensagem

        //setando variavel para mostrar apenas uma mesa para o usuário
        $select['nome'] = "vw_MesasIniciadas";
        $select['condicao'] = "data_hora = '$data_hora'";
    }

    $b = new BD($conn);

    $retorno_mesas = $b->select($select);

    if($retorno_mesas == null){
        echo "Não possuem mesas iniciadas para a data de ".date('d/m/Y')." para iniciar uma mesa <a href='Form_Iniciar_Mesa.php'>clique aqui.</a>";
    }
    else{
        //montando os paramentros do radio
        $r = array("label"=>"$msg_mesa","nome"=>"id_reserva", "tipo"=>"radio",);
            
        foreach($retorno_mesas as $v){
                
            $vet_radio[$v['id_reserva']] = $v['cod_mesa'];
        }

        //instanciando os objetos de radio relacionadas as mesas
        $radio = new Radio($r, $vet_radio);

        $table = "item";

        $retorno_item = $b->select($table);
            
        if($retorno_item == null){
           echo "Não possuem itens cadastrados para serem inseridos na mesa, para cadastrar um item <a href='Form_Item.php'>clique aqui.</a>";
        }
        else{

            $check = array("label"=>"Itens", "nome"=>"sequencia", "tipo"=>"checkbox");
            
            foreach($retorno_item as $v){
                
                $vet_checkbox[$v['id_item']] = $v['descricao'];
            }
            
            $checkbox = new CheckBox($check, $vet_checkbox);

            $table = "atendente";
            $atendentes = $b ->  select($table);

            //criando vetor de options
            $opt[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
            foreach($atendentes as $v){
                $opt[]= array("valor"=>$v['id_atendente'],"texto"=>$v['nome']);
            }

            //instanciando os objetos options
            foreach($opt as $v){
                $o[]= new Option($v);
            }

            //instanciando o objeto select passando os objetos option de atendentes
            $select = array("nome"=>"cod_atendente", "label"=>"Atendente");
            $s = new Select($select, $o);

            $f = array("nome"=>"pedido", "action"=>"Cadastro_Pedido.php", "method"=>"post");
            $form = new Form($f);

            //adicionando os objetos input 1 e um textarea 1
            $form->add_radio($radio);
            $form->add_checkbox($checkbox);
            $form->add_select($s);
            $form->exibe_form();
        }
    }

        /*  1. PEGAR TODAS AS MESAS RESERVADAS NO BANCO DE DADOS NAQUELE DIA E PREENCHE-LOS EM RADIOS,
        CASO SEJA RECONHECIDO UM GET, ELE MOSTRARA APENAS A MESA PASSADA PELO GET (POIS SIGNIFICA QUE
        HOUVE REDIRECIONAMENTO DA TELA FORM_INICIAR_MESA.PHP).

        2. LISTAR TODOS OS PRATOS, DRINKS E BEBIDAS EM RADIOS.

        3. PREENCHER SELECT COM OS ATENDENTES CADASTRADOS

        DEVERA REDIRECIONAR PARA CADASTRO_PEDIDO.PHP
        */
?>