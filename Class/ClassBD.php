<?php

    class BD{
        protected $conn;
        protected $table;
        
        protected function set_conn($conexao){
            $this->conn=$conexao;
        }

        protected function set_table($tabela){
            $this->table=$tabela;
        }

        public function select($tabela){

            $this->set_table($tabela);

            $select="SELECT * FROM ".$this->table.";";

            $stmt=$this->conn->prepare($select);
            $stmt->execute();

            $cont=0;
            $vetor_retorno=array();
            while($retorno=$stmt->fetch()){
				
                foreach($retorno as $i => $v){
                    
                    if(!is_numeric($i)){
                        $vetor_retorno[$cont][$i]=$v;
                    }
                }

                $cont++;
            }

            return ($vetor_retorno);
        }

        public function __construct(PDO $conexao){
            $this->set_conn($conexao);
        }
    }

?>