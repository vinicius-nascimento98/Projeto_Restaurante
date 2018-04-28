<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    include("Conexao.php");
    include("funcoes.php"); //mudar para conceito orientação objeto

    $outp = busca_mesa($conn,false);

    echo json_encode($outp);
?>