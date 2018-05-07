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

        public function __construct(PDO $conexao){
            $this->set_conn($conexao);
        }
    }

?>