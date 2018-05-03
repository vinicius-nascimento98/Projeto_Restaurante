<?php

	include('Cabecalho/Cabecalho.php'); //mudar para cabecalho geral
	include('Class/ClassTable.php');
	include('Conexao.php');

	$select = "SELECT id_mesa, status_mesa FROM mesa";
	
	$stmt = $conn -> prepare($select);
	
	$stmt->execute();
	
	$cont = 0;

    while($linha = $stmt->fetch()){
        
        foreach($linha as $i => $v){

            if(!is_numeric($i)){

                $dados[$i][$cont] = $v;
            }
        }

        $cont++;
    }
	
	if(isset($dados)){
		
		$h = new Thead($dados);
		$b = new Tbody($dados, 'mesa');

		$t = new Table($h,$b);

		echo "<h1> Mesas Cadastradas</h1>";
		echo "<hr>";

		$t->imprime_table();
	
	}
	
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}
?>