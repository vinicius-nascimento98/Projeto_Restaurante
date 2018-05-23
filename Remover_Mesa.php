<?php

	include ('Conexao.php');
	include ('Class/Control/ClassBD.php');
	
	$m = new BD($conn);
	
	$remover_mesa = $m->select("vw_max_mesa");
	
	header("Location: Remover.php?id=$remover_mesa&tabela=mesa");
?>