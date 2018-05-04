<?php

include ('Conexao.php');

$delete = "delete FROM " . $_GET["tabela"] . " WHERE id_". $_GET["tabela"] ." = " . $_GET["id"];

$stmt = $conn -> prepare($delete);

$stmt->execute();

//redirecionando usuário após a remoção no banco de dados
/*1. str_place interno- troca os _ da string por "espaço"
  2. ucwords interno- troca as primeiras letras de cada palavra para maiuscula
  3. str_replace externo- troca os "espaço" da string por _ */
header("location: Listar_". str_replace(" ","_",ucwords(str_replace("_"," ",$_GET[tabela]))) . ".php");
?>