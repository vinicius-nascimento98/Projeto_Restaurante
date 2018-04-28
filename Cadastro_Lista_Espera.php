<?php

    include("Conexao.php");
    include("cabecalhos/cabecalho.html"); //mudar cabecalho geral

    //verificando se foi passado um POST
    if(!empty($_POST)){

        //preparando o query de inserção para execução no banco de dados
        $insert="INSERT INTO lista_espera (nome_Cliente,Ordem,data_Espera,telefone,cod_Atendente) VALUES (:cliente,:ordem,:data_espera,:telefone,:atendente);";

        $stmt = $conn->prepare($insert);

        $nome = $_POST['nome_cliente'];
        $ordem = $_POST['ordem'];
        $data_espera = $_POST['data_espera'];
        $telefone = $_POST['telefone'];
        $atendente = $_POST['atendente'];

        $stmt->bindValue(":cliente",$nome);
        $stmt->bindValue(":ordem",$ordem);
        $stmt->bindValue(":data_espera",$data_espera);
        $stmt->bindValue(":telefone",$telefone);
        $stmt->bindValue(":atendente",$atendente);

        $stmt->execute();

        echo "Cliente adicionado a lista de espera com sucesso!";

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>