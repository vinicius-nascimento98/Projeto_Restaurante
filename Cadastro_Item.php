<?php
if(!empty($_POST)){
	include('Conexao.php');
$insert = "INSERT INTO Item(descricao, custo, disponibilidade, tipo) VALUES (:descricao, :custo, :disponibilidade, :tipo);";

$stmt = $conn->prepare($insert);

$descricao = $_POST['descricao'];
$custo = $_POST['custo'];
$disponibilidade = $_POST['disponibilidade'];
$tipo = $_POST['tipo'];
	
$stmt->bindValue(':descricao', $descricao);
$stmt->bindValue(':custo', $custo);
$stmt->bindValue(':disponibilidade', $disponibilidade);
$stmt->bindValue(':tipo', $tipo);

$stmt->execute();

echo "Item cadastrado com sucesso!!";
echo"<br /><a href='Form_Item.php'>Cadastrar novo Item</a>";
}else{
	header("location: Form_Item.php");
}

?>