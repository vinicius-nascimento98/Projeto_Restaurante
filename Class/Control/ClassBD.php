<?php

    class BD{
        protected $conn;
        
        protected function set_conn($conexao){
            $this->conn=$conexao;
        }

        /*método responsável por montar o select para consulta, utilizando a
         tabela passado por parametro e retornando uma matriz de resultados,
         adquiridos pela consulta no BD.*/
        public function select($tabela){
             
            $select = "SELECT * FROM ". $tabela;

            $stmt = $this->conn->prepare($select);
            $stmt->execute();

            $cont = 0;
            $vetor_retorno = array();
			
            while($retorno = $stmt->fetch()){
				
                foreach($retorno as $i => $v){
                    
                    if(!is_numeric($i)){
                        $vetor_retorno[$cont][$i]=$v;
                    }
                }

                $cont++;
            }

            return ($vetor_retorno);
        }

        public function delete($vetor_delete){
            
            $delete = "DELETE FROM " . $vetor_delete["tabela"] . " WHERE id_". $vetor_delete["tabela"] ." = " . $vetor_delete["id"];

            $stmt = $this->conn-> prepare($delete);
            $stmt->execute();
        }

        public function insert($dados,$tabela){
            
            //montando string de insert
            $insert = "INSERT INTO ".$tabela;

            $cont=0;
            foreach($dados as $i=>$v){
                
                if($cont == 0){
                    $insert.= "($i";
                    $cont++;
                }
                else{
                    $insert.=", $i";
                }
            }

            $insert.=") VALUES ";

            $cont=0;
            foreach($dados as $i=>$v){
                
                if($cont == 0){
                    $insert.= "(:$i";
                    $cont++;
                }
                else{
                    $insert.=", :$i";
                }
            }

            $insert.=");";

            $stmt = $this->conn->prepare($insert);

            //criando bind values com os valores do POST
            foreach($dados as $i=>$v){
                $stmt->bindValue(":$i",$v);
            }

            //executando a string de INSERT
            $stmt->execute();

        }

        public function __construct(PDO $conexao){
            $this->set_conn($conexao);
        }
    }

?>