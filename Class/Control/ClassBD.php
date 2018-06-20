<?php

    class BD{
        protected $conn;
        
        protected function set_conn($conexao){
            $this->conn=$conexao;
        }

        /*método responsável por montar o select para consulta, utilizando a
         tabela passado por parametro e retornando uma matriz de resultados,
         adquiridos pela consulta no BD.*/        
        public function select($dados){

            if(is_array($dados)){
                $select = "SELECT * FROM ". $dados['nome']." WHERE ".$dados['condicao'];
            }
            else{
                $select = "SELECT * FROM ". $dados;
            }

            $stmt = $this->conn->prepare($select);
            
            $stmt->execute();

            $cont = 0;
            $matriz_retorno = array();
			
            while($retorno = $stmt->fetch()){
				
                foreach($retorno as $i => $v){
                    
                    if(!is_numeric($i)){
                        $matriz_retorno[$cont][$i]=$v;
                    }
                }

                $cont++;
            }

            return ($matriz_retorno);
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
		
		public function update($dados){
			
            $tabela = $dados['tabela'];
			$id	= $dados['chave_tabela'];
			
			$prefixo = $dados["prefixo_chave"];
			
			
			$i = 0;
			
            //montando string de UPDATE
			//substr descobrindo o nome da tabela, strlen da o tamanho da string
            
			$update = " UPDATE ".$tabela." SET ";
			
			//sempre inicia em 2, pois foi adicionado prefixo para definir se é id ou cod.
            $cont=0;
            while($teste = current($dados)){
				
				if($i > 2){				
				
					if($cont == 0){
						$update.= key($dados) .'= :'. key($dados);
						$cont++;
						
					}
					else{
						$update.= ','. key($dados) .'= :'. key($dados);
					}
				}
				$i++;
				next($dados);
			}
			//update atendente set nome=:nome, comissao=:comissao, email=:email
            $update.=" WHERE ".$prefixo."_".$tabela."=:".$prefixo."_".$tabela;
	
            $stmt = $this->conn->prepare($update);
			
			//criando bind values com os valores do POST
			//sempre inicia em 2, pois foi adicionado prefixo para definir se é id ou cod.
			$i=0;
			reset($dados);
			while($teste = current($dados)){
				
				if($i > 2){				
					
					$stmt->bindValue(':'.key($dados),$teste);
					
					
				}
				$i++;
				next($dados);
			}
			$stmt->bindValue(":{$prefixo}_". $tabela, $id);
            
            //executando a string de UPDATE
            $stmt->execute();
		
        }
    }
?>