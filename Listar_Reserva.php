<?php

    include("Conexao.php");
    include("Class/ClassTable.php");
    include("Cabecalho/Cabecalho.php"); //mudar para cabecalho geral

    //preparando o query de busca para execução no banco de dados
    $select = "SELECT telefone ID,nome_ClientE CLIENTE,telefone TELEFONE,data_HorA DATA_CADASTRO_RESERVA,cod_Mesa MESA,atendente.nome ATENDENTE FROM reserva INNER JOIN atendente ON reserva.cod_atendente=atendente.id_atendente;";

    $stmt=$conn->prepare($select);

    $stmt->execute();

    //adicionando os dados retornados pelo banco e guardando na matriz $dados
    $cont = 0;
    while($linha = $stmt -> fetch()){

        foreach($linha as $i => $v){
            
            if(!is_numeric($i)){
                $dados[$i][$cont] = $v;
            }
        }

        $cont++;
    }
    
    //instanciando um objeto table por meio da matriz $dados
    if($cont >= 1){

        $h = new Thead($dados);
        $b = new Tbody($dados,"reserva");

        $t = new Table($h,$b);

        echo "<h1>Lista de Reservas</h1>";
        echo "<hr>";

        $t->imprime_Table();
    }
    else{
        echo "<h3>Ainda não existem clientes na Lista de Espera</h3>";
    }

?>