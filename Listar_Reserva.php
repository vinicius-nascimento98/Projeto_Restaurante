<?php

	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
    include("Class/Model/ClassReserva.php");
    include("Class/View/ClassTable.php");
    include("Conexao.php");
    
    $r=new BD($conn);

    $table = "vw_reserva";
    $retornoReserva = $r->select($table);
    
    //se tiver retorno do banco ele entra o if
	if($retornoReserva!=null){
        
        //buscando os atendentes no banco de dados
        $table = "atendente";
        $retornoAtendente = $r->select($table);

        //buscando as mesas no banco de dados
        $table = "mesa";
        $retornoMesa = $r->select($table);
        
        foreach($retornoReserva as $v){
            
            //criando os objetos dos atendentes relacionados com a reserva
            foreach ($retornoAtendente as $val) {
                             
                if($val['nome'] == $v['nome']){
                    $a[] = new Atendente($val);
                }
            }

            //criando os objetos das mesas relacionados com a reserva
            foreach($retornoMesa as $val){
                
                if($val['id_mesa'] == $v['cod_mesa']){
                    $m[] = new Mesa ($val);
                }
            
            }

        }

        //for responsável por percorrer as reservas no banco de dados
        for ($i=0; $i < sizeof($retornoReserva); $i++) { 
            
            //instanciando objeto reserva, passando os objetos de mesa e atendente respectivos a reserva
            $reserva[]=new Reserva($retornoReserva[$i],$m[$i],$a[$i]);
        }

        //criando vetor de cabecalho
        foreach($retornoReserva[0] as $i=>$v){
            $cabecalho[]=$i;
        }

        $t = new Table($cabecalho,$reserva);


	}
	else{
		echo"<h1>Não possui DADOS!!</h1>";
	}
?>