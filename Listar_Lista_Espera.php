<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassLista_Espera.php");
    include("Class/Model/ClassAtendente.php");
    include("Class/View/ClassTable.php");
    include("Conexao.php");
    
    $l=new BD($conn);

    $table = "vw_espera";
    $retornoEspera = $l->select($table);
    
    //se tiver retorno do banco ele entra o if
	if($retornoEspera!=null){
        
        //buscando os atendentes no banco de dados
        $table = "atendente";
        $retornoAtendente = $l->select($table);
        
        foreach($retornoEspera as $v){
            
            //criando os objetos dos atendentes relacionados com a reserva
            foreach ($retornoAtendente as $val) {
                             
                if($val['nome'] == $v['nome']){
                    $a[] = new Atendente($val);
                }
            }

        }

        //for responsável por percorrer as reservas no banco de dados
        for ($i=0; $i < sizeof($retornoEspera); $i++) { 
            
            //instanciando objeto reserva, passando os objetos de mesa e atendente respectivos a reserva
            $lista_espera[]=new Lista_Espera($retornoEspera[$i],$a[$i]);
        }

        //criando vetor de cabecalho
        foreach($retornoEspera[0] as $i=>$v){
            $cabecalho[]=$i;
        }

        $t = new Table($cabecalho,$lista_espera);

    }
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}

    
?>