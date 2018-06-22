<?php

    include("Class/Control/ClassBD.php");
    include("Cabecalho/Cabecalho.php");

    //verificando se foi passado um POST
    if(!empty($_POST)){

        include("Conexao.php");

		$i = new BD($conn);
        print_r($_POST);
		//$r->update($_POST,"reserva");

		echo "<br/>";
        echo "Mesa iniciada com sucesso! Para adicionar pedidos a mesa <a href='Form_Pedido.php'>clique aqui</a>";

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>