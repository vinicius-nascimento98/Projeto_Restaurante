<?php

    include("Conexao.php");
    include("Class/ClassTable.php");
    include("Cabecalho/Cabecalho.php"); //mudar para cabecalho geral

    //preparando o query de busca para execução no banco de dados
    $select = "SELECT telefone ID,nome_Cliente CLIENTE,telefone TELEFONE,Ordem ORDEM,data_Espera CADASTRADO,atendente.nome ATENDENTE FROM lista_espera INNER JOIN atendente ON lista_espera.cod_Atendente = atendente.id_Atendente ORDER BY ORDEM;";

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
        $b = new Tbody($dados,"espera");

        $t = new Table($h,$b);

        echo "<h1>Lista de Espera</h1>";
        echo "<hr>";

        $t->imprime_Table();
    }
    else{
        echo "<h3>Ainda não existem clientes na Lista de Espera</h3>";
    }

?>