<?php

    include("Class/Control/ClassBD.php");
    include("Cabecalho/Cabecalho.php");

    //verificando se foi passado um POST
    if(!empty($_POST)){

        include("Conexao.php");

        print_r($_POST);
		/*$l = new BD($conn);

		$l->insert($_POST,"lista_espera");

		echo "<br/>";
        echo "Reserva cadastrada com sucesso!";*/

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>