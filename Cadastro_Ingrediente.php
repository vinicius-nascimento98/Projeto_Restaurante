<?php
if(!empty($_POST)){
	include('Conexao.php');
$insert = "INSERT INTO ingrediente (nome_Ingrediente, custo, estoque) values (:nome_Ingrediente, :custo, :estoque);";

$stmt = $conn->prepare($insert);

$nome_Ingrediente = $_POST['nome_Ingrediente']; 
$custo = $_POST['custo'];
$estoque = $_POST['estoque'];

$stmt->bindValue(':nome_Ingrediente',$nome_Ingrediente);
$stmt->bindValue(':custo',$custo);
$stmt->bindValue(':estoque',$estoque);

$stmt->execute();

echo "Ingrediente cadastrado com sucesso!";
echo "<br /><a href='Form_Ingrediente.php'>Cadastrar novo Ingrediente</a>";

}
else{
	header("location: Form_Ingrediente.php");
}
?>