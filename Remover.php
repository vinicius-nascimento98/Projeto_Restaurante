<?php

include ('Conexao.php');

$delete = "delete FROM " . $_GET["tabela"] . " WHERE id_". $_GET["tabela"] ." = " . $_GET["id"];

$stmt = $conn -> prepare($delete);

$stmt->execute();

//redirecionando usuário após a remoção no banco de dados
header("location: Listar_". $_GET[tabela] . ".php");
?>