<?php

    //função responsável por buscar os atendentes cadastrados no banco de dados e guarda-los em um vetor
    function busca_atendente($conn){
       
        $select = "SELECT id_Atendente,nome FROM atendente;";

        $stmt = $conn->prepare($select);

        $stmt->execute();
        
        //criando um vetor de options, pegando os dados do banco
        $nome_atendentes[0] = array('valor'=>'atendente', 'texto'=>'-- Atendente --');
        
        $cont=1;
        while($linha = $stmt->fetch()){
            
            $nome_atendentes[($cont)] = array ('valor'=>$linha["id_Atendente"], 'texto'=>$linha["nome"]);
        
            $cont++;
        }

        return $nome_atendentes;
    }

    //função responsável por buscar as mesas cadastradas no banco de dados e guarda-los em um vetor
    function busca_mesa($conn,$listar_mesa){
        
        $select = "SELECT id_Mesa FROM mesa WHERE status_Mesa = 'liberada'";

        $stmt = $conn->prepare($select);

        $stmt->execute();

        $cont=0;
        $outp=array();
        while($linha = $stmt->fetch()){

            //caso seja para montar um vetor onde sera instanciado um objeto apartir dele
            if($listar_mesa){
                $outp[0] = array("valor"=>"selecione","texto"=>"-- Mesas --");

                foreach($linha as $i=>$v){
                
                    if(is_numeric($i)){
                        $outp[$cont+1] = array("valor"=>$v,"texto"=>$v);
                    }
                }

            }
            //caso seja para apenas retornar os dados contidos na tabela, onde sera passado por JSON
            else{   
                $outp[$cont] = $linha;
                $cont++;
            }
        }

        return($outp);
    }

?>