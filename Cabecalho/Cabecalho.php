<?php

header('Content-Type: text/html; charset=utf-8');

?>

<!doctype html>

<html lang="pt-BR">
	<head>
		<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Restaurante</title>
		<link rel="shortcut icon" type="imagens/png " href="imagens">
		
		<link rel="stylesheet" href="stylesheets/bootstrap.min.css">
		<link rel="stylesheet" href="stylesheets/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="stylesheets/restaurante.css">
       
    </head>
	</head>
	
	<body>
		<nav class="navbar navbar-dark bg-primary navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" id="button-responsivo" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
						<span class="icon-bar" id="bar"></span>
						<span class="icon-bar" id="bar"></span>
						<span class="icon-bar" id="bar"></span>
					</button>
					<a href="Form_Atendente.php" class="navbar-brand logotipo">
						<img class="img-responsive pull-left" src="imagens/ifsp.jpeg" alt="IFSP">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="menu">
					<div class="dropdown" style="display: inline-block;">
						<button class="btn btn-primary dropdown-toggle" type="button" id="Cadastro" data-toggle="dropdown" aria-expanded="false">
							Cadastro
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="Cadastro">
							<li><a href="Form_Atendente.php">Cadastrar Atendentes</a></li>
							<li><a href="Form_Ingrediente.php">Cadastrar Ingredientes</a></li>
							<li><a href="Form_Item.php">Cadastrar Item</a></li>
							<li><a href="Form_Reserva.php">Cadastrar Reserva</a></li>
							<li><a href="Form_Mesa.php">Cadastrar Mesa</a></li>
						</ul>
					</div>
					<div class="dropdown" style="display: inline-block;">		
						<button class="btn btn-primary dropdown-toggle" type="button" id="Listagem" data-toggle="dropdown" aria-expanded="false">
							Listagem
							<span class="caret"></span>
						</button>				
						<ul class="dropdown-menu" aria-labelledby="Listagem">
							<li><a href="Listar_Ingrediente.php">Listar Ingredientes</a></li>
							<li><a href="Listar_Lista_Espera.php">Listar Espera</a></li>
							<li><a href="Listar_Reserva.php">Listar Reservas</a></li>
							<li><a href="Listar_Atendente.php">Listar Atendentes</a></li>
							<li><a href="Listar_Estoque.php">Listar Estoque</a></li>
							<li><a href="Listar_Vinho.php">Listar Vinho</a></li>
							<li><a href="Listar_Bebida.php">Listar Bebida</a></li>
						</ul>
					</div>
					<div class="dropdown" style="display: inline-block;">		
						<button class="btn btn-primary dropdown-toggle" type="button" id="mesa" data-toggle="dropdown" aria-expanded="false">
							Mesa
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="mesa">
							<li><a href="Remover_Mesa.php">Remover Mesa</a></li>
							<li><a href="Form_Iniciar_Mesa.php">Iniciar Mesa</a></li>
							<li><a href="Form_Pedido.php">Adicionar Pedidos a Mesa</a></li>	
						</ul>
					</div>
				</div>
			</div>
		</nav>
	<hr />
	<br />
	<script src='Javascripts/jquery-2.2.4.min.js' type='text/javascript'></script>
	<script src="Javascripts/bootstrap.min.js"></script>
	<script src="Javascripts/bootstrap-datepicker.min.js"></script>
	<script src="Javascripts/bootstrap-datepicker.pt-BR.min.js"></script>
	<script src="Javascripts/typeahead.js"></script>