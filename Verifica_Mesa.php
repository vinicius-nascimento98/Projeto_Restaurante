<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    include("Conexao.php");
    include("Class/Control/ClassBD.php");

    $m = new BD($conn);
    
    $table = '';

    $m-> 

    echo json_encode($outp);
?>