<?php


//print_r($_POST);

//die();

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
				$ingrediente['quantidade'] = $_POST['quantidade'];
				
				
				foreach($_POST["ingrediente"] as $i=>$v){
					$prato["cod_prato"] = $id;
					$prato["cod_ingrediente"] = $v;
					$prato["quantidade"] = $_POST["qtdIngrediente"][$v];
					$ingrediente->insert($ingrediente, "ingrediente");
				}
				
			break;
			
			case 'drink':
				foreach($_POST["ingrediente"] as $i=>$v){
					$drink["cod_drink"] = $id;
					$drink["cod_ingrediente"] = $v;
					$drink["quantidade"] = $_POST["qtdIngrediente"][$v];
					$ingrediente->insert($ingrediente, "ingrediente");
				}
					
			break;
			
			case 'vinho':
				$vinho['tipo_uva'] = $_POST['tipo_uva'];
				$vinho['safra'] = $_POST['safra'];
				$vinho['estoque'] = $_POST['estoque'];
				$vinho['cod_vinho'] = $id;
				$item->insert($vinho, "vinho");
			break;
			
			case 'bebida':
				$bebida['estoque'] = $_POST['estoque'];
				$bebida->insert($bebida, "bebida");
			break;
	
		}
		
		echo "<br />";
		echo "Item cadastrado com sucesso!!";
		
	}
	else{
		header("location: Form_Item.php");
	}

?>