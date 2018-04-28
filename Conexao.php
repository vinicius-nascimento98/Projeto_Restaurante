<?php
//conexao.
$servBD = 'mysql:host=localhost:3307;dbname=restaurante';
$usuario = 'root';
$senha = 'usbw';

$conn = new PDO($servBD, $usuario, $senha);
?>