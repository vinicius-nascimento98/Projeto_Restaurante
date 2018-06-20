<?php

	if(!empty($_POST)){
		include("Cabecalho/Cabecalho.php");
		include("Class/Control/ClassBD.php");
		include("Conexao.php");

		$item = new BD($conn);
		
		$i['descricao'] = $_POST['descricao'];
		$i['custo'] = $_POST['custo'];
		$i['disponibilidade'] = $_POST['disponibilidade'];
		$i['tipo'] = $_POST['tipo'];
		
		$item->insert($i, "item");
		
		//Ultimo id inserido.
		$id = $conn->lastInsertId();
		
		switch($_POST["tipo"]){
			
			case 'prato':
				$prato_ingrediente = new BD($conn);
				
				foreach($_POST["ingrediente"] as $i=>$v){
					$prato["cod_prato"] = $id;
					$prato["cod_ingrediente"] = $v;
					$prato["quantidade"] = $_POST["qtdIngrediente"][$v];
					$prato_ingrediente->insert($prato, "prato_ingrediente");
				}
				
			break;
			
			case 'drink':
				$drink_ingrediente = new BD($conn);
				foreach($_POST["ingrediente"] as $i=>$v){
					$drink["cod_drink"] = $id;
					$drink["cod_ingrediente"] = $v;
					$drink["quantidade"] = $_POST["qtdIngrediente"][$v];
					$drink_ingrediente->insert($drink, "drink_ingrediente");
				}
					
			break;
			
			case 'vinho':
				$vinho = new BD($conn);
				
				$v['tipo_uva'] = $_POST['tipo_uva'];
				$v['safra'] = $_POST['safra'];
				$v['estoque'] = $_POST['estoque_vinho'];
				$v['cod_vinho'] = $id;
				$vinho->insert($v, "vinho");
			break;
			
			case 'bebida':
				$bebida = new BD($conn);
				
				$b['cod_bebida'] = $id;
				$b['estoque'] = $_POST['estoque_bebida'];
				$bebida->insert($b, "bebida");
			break;
	
		}
		
		echo "<br />";
		echo "Item cadastrado com sucesso!!";
		
	}
	else{
		header("location: Form_Item.php");
	}

?>