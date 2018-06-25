<?php

    include("Class/Control/ClassBD.php");
    include("Cabecalho/Cabecalho.php");

    //verificando se foi passado um POST
    if(!empty($_POST)){

        include("Conexao.php");

		$r = new BD($conn);

		$r->insert($_POST,"reserva");

		echo "<br/>";
        
        if(!isset($_GET['mesa_iniciada'])){
            echo "Reserva cadastrada e Mesa Inicada com sucesso!";
        }
        else{
            echo "Reserva cadastrada com sucesso!";
        }

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>