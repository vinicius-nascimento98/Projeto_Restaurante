<?php
	include("Cabecalho/Cabecalho.php");

if(!empty($_POST)){
	include("Conexao.php");

	$insert_atendente = "INSERT INTO atendente(nome,comissao) values (:nome,:comissao);";

	$stmt = $conn->prepare($insert_atendente);

	$nome = $_POST["nome"];
	$comissao = $_POST["comissao"];

	$stmt->bindValue(':nome',$nome);
	$stmt->bindValue(':comissao',$comissao);

	$stmt->execute();
	echo "<br/>";
	echo "Atendente Cadastrado com Sucesso";
	
	//echo "<br /> <a href='Form_CadastroAtendente.php'> Cadastrar novo Atendente </a>";
}	
else{
	header("location: Form_Atendente.php");
}

?>