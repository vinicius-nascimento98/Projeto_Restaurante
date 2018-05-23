<?php

	include ('Conexao.php');
	include ('Class/Control/ClassBD.php');
	
	$m = new BD($conn);
	
	$remover_mesa = $m->select("vw_max_mesa");
	$id_mesa = $remover_mesa["id_mesa"];
	
	header("Location: Remover.php?id=$id_mesa&tabela=mesa");
?>