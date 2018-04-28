<?php

    include("Conexao.php");
    include("cabecalhos/cabecalho.html"); //mudar cabecalho geral

    //verificando se foi passado um POST
    if(!empty($_POST)){

        //preparando o query de inserção para execução no banco de dados
        $insert="INSERT INTO reserva (nome_Cliente,telefone,data_Hora,cod_Mesa,cod_Atendente) VALUES (:cliente,:telefone,:data_reserva,:mesa,:atendente);";

        $stmt = $conn->prepare($insert);

        $nome = $_POST['nome_cliente'];
        $telefone = $_POST['telefone'];
        $data_reserva = $_POST['data_reserva'];
        $mesa = $_POST['mesas'];
        $atendente = $_POST['atendente'];

        $stmt->bindValue(":cliente",$nome);
        $stmt->bindValue(":telefone",$telefone);
        $stmt->bindValue(":data_reserva",$data_reserva);
        $stmt->bindValue(":mesa",$mesa);
        $stmt->bindValue(":atendente",$atendente);

        $stmt->execute();

        echo "Reserva cadastrada com sucesso!";

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>