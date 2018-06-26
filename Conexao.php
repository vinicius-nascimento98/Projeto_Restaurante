<?php
//conexao.
$servBD = 'mysql:host=localhost;dbname=restaurante';
$usuario = 'root';
$senha = '';

$conn = new PDO($servBD, $usuario, $senha);

$conn->exec("set names utf8");
?>