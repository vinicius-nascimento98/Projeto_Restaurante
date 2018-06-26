<?php

    include("Class/Control/ClassBD.php");
    include("Cabecalho/Cabecalho.php");

    //verificando se foi passado um POST
    if(!empty($_GET)){

        include("Conexao.php");

        $id_reserva = $_GET['id_reserva'];

		$i = new BD($conn);
        $update['tabela']="reserva";
		$update['chave_tabela']=$id_reserva;
		$update["prefixo_chave"]="id";
        $update['mesa_iniciada']="1";
        
		$i->update($update);

		header("Location: Form_Pedido.php?id_reserva=$id_reserva");

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>