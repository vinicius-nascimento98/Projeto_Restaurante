<?php

    include("Class/ClassBD.php");
    include("Cabecalho/Cabecalho.php");

    //verificando se foi passado um POST
    if(!empty($_POST)){

        include("Conexao.php");

		$l = new BD($conn);

		$l->insert($_POST,"lista_espera");

		echo "<br/>";
        echo "Cliente adicionado a lista de espera com sucesso!";

    }
    else{
        echo "OPS! Ocorreu um problema, por favor tente novamente.";
    }

?>