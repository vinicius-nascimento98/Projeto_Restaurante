<?php
    if(!empty($_POST)){
        
        include("Cabecalho/Cabecalho.php");
		include("Class/Control/ClassBD.php");
		include("Conexao.php");
        
        date_default_timezone_set('America/Sao_Paulo');
        
        
        $b= new BD($conn);

        $id_reserva = $_POST["id_reserva"];

        $select['nome'] = "reserva";
        $select['condicao'] = "id_reserva = $id_reserva";

        $retorno_mesa = $b->select($select);

        //laço reponsável por pegar o cod_mesa
        foreach($retorno_mesa as $v){
            $cod_mesa = $v['cod_mesa'];
        }

        /*percorrendo o post que pode ser um vetor de sequencias
         e inserindo linha a linha no banco de dados*/
		$i=0;
        foreach($_POST["sequencia"] as $v){
            $pedido["cod_reserva"] = $id_reserva;
            $pedido["data_hora"] = date('Y-m-d h:i:').($i+date("s"));
            $pedido["cod_mesa"] = $cod_mesa;
            $pedido["sequencia"] = $v;
            echo "... inserindo ".$v;
            $b->insert($pedido, "pedido");
            echo ": inserido.<br>";
            $i++;
        }

        echo "Pedidos adicionados a mesa com sucesso!";
    }

?>