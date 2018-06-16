<?php 
	
	class Thead{
		protected $head=array();
		protected $tagHead;

		public function imprime_head(){
			echo $this->tagHead;
		}

		public function set_head(){
			$this->tagHead = "<thead><tr>";
			$i=0;
			foreach ($this->head as $v) {
				if($i==0){
						$i++;
				}
				else{
					$this->tagHead .= "<th>".$v."</th>";
				}
			}

			$this->tagHead .= "<th>Comprar | Descartar</th></tr></thead>";
		}

		public function __construct($vetor_cabecalho){
			
			foreach ($vetor_cabecalho as $v) {
				array_push($this->head, $v);
			}

			$this->set_head();
		}

	}

	class Tbody{
		protected $tagBody;
		protected $vetorHead=array();

		public function imprime_body(){
			echo $this->tagBody;
		}

		public function set_nomeTabela($tabela){
			$this->nomeTabela = $tabela;
		}

		public function add_body($objBody){
			$tabela = strtolower(get_class($objBody));
			//abrindo uma linha na tabela
			$this->tagBody.="<tr>";

			//laço responsável por montar as colunas da tabela
			foreach ($this->vetorHead as $lin) {

				echo $lin;
				$method = "get_".$lin;

				if(substr($lin,0,2) == "id"){
					$id = $objBody->$method();
					$prefixo = "id";
				}
				elseif(substr($lin,0,3) == "cod"){
					$id=$objBody->$method();
					$prefixo = "cod";
				}
				elseif($lin == 'tipo'){
					$tabela = $objBody->method();
				}
				else{
					$this->tagBody.="<td class='$lin'>".$objBody->$method()."</td>";
				}
				
			}
			
			//adicionando as colunas com input number.
			//adicionando as colunas com value $tabela.
			//adicionando as colunas com value $prefixo.
			$this->tagBody.="<td class='valorAlteraEstoque'><div class='id_produto' ><input type='hidden' id='id_produto' value='$id' /></div><div class='tabela' ><input type='hidden' id='tabela' value='$tabela' /></div><input type='number' value='0' step='0.01' min='0' /><input type='hidden' class='prefixo' value='$prefixo' /></td>";

			//fechando a linha da tabela
			$this->tagBody.="</tr>";
		}

		public function __construct($vetor_cabecalho){

			//$this->set_nomeTabela($tabela);

			foreach ($vetor_cabecalho as $v) {
				array_push($this->vetorHead,$v);
			}

			$this->tagBody="<tbody>";
		}
	}
	
	class TableEstoque {
		
		protected $thead;
		protected $tbody;

		public function set_thead($dadoshead){
			$this->thead=$dadoshead;
		}

		public function set_tbody($objBody){
			$this->tbody=$objBody;
		}

		public function imprime_table(){			
			echo "<div>";
			echo "<table border='1'>";
			$this->thead->imprime_head();
			$this->tbody->imprime_body();
			echo "</tbody>";
			echo "</table>";
			echo "</div>";
		}

		public function __construct($cabecalho, $vetorObj){
			$h=new Thead($cabecalho);
			$b=new Tbody($cabecalho);

			foreach($vetorObj as $v){
				$b->add_body($v);
			}

			$this->set_thead($h);
			$this->set_tbody($b);

			$this->imprime_table();
		}
		
	}
	
	//strtoupper->deixa a string maiuscula
	//strtolower() deixa a string minuscula
?>