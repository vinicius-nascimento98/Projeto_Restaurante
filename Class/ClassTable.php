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

			$this->tagHead .= "<th>Ação</th></tr></thead>";
		}

		public function __construct($matrixDados){
			
			foreach ($matrixDados as $i => $v) {
				array_push($this->head, $i);
			}

			$this->set_head();
		}

	}

	class Tbody{
		protected $tagBody;
		protected $vetorHead=array();
		protected $nomeTabela;

		public function imprime_body(){
			echo $this->tagBody;
		}

		public function set_nomeTabela($tabela){
			$this->nomeTabela = $tabela;
		}

		public function set_body($dadosBody){

			//descobrindo a quantidade de dados em minha primeira linha da matriz
			$qntdLin = sizeof($dadosBody[$this->vetorHead[0]]);

			$this->tagBody="<tbody>";

			//laço mais externo é responsável por percorrer as linhas de minha tabela (colunas da matriz)
			for($col=0; $col<$qntdLin; $col++){

				$this->tagBody.="<tr>";

				$i=0;
				//laço mais interno é responsável por percorrer as colunas da minha tabela (linhas da matriz)
				foreach ($this->vetorHead as $lin) {
					if($i==0){
						$id=$dadosBody[$lin][$col];
						$i++;
					}
					else{
						$this->tagBody.="<td>".$dadosBody[$lin][$col]."</td>";
					}
				}

				$this->tagBody.="<td><a href = 'altera.php?id=".$id."&tabela=".$this->nomeTabela."'>Alterar</a> | <a href = 'remove.php?id=".$id."&tabela=".$this->nomeTabela."'>Remover</a></td></tr>";
			}

			$this->tagBody.="</tbody>";

		}

		public function __construct($matrixDados,$tabela){

			$this->set_nomeTabela($tabela);

			foreach ($matrixDados as $i => $v) {
				array_push($this->vetorHead,$i);
			}

			$this->set_body($matrixDados);
		}
	}

	class Table{
		protected $thead;
		protected $tbody;

		public function set_thead($dadoshead){
			$this->thead=$dadoshead;
		}

		public function set_tbody($dadosbody){
			$this->tbody=$dadosbody;
		}

		public function imprime_table(){			
			echo "<div>";
			echo "<table border='1'>";
			$this->thead->imprime_head();
			$this->tbody->imprime_body();
			echo "</table>";
			echo "</div>";
		}

		public function __construct(Thead $head, Tbody $body){
			$this->set_thead($head);
			$this->set_tbody($body);
		}

	}

?>