<?php
	include("ClassItem.php");

	class Bebida extends Item{
		protected $cod_bebida;
		protected $estoque;
		
		public function __construct($bebida){
			parent:: __construct($bebida);
			if(isset($bebida["cod_bebida"])){
				$this->set_cod_bebida($bebida["cod_bebida"]);
			}
			$this->set_estoque($bebida["estoque"]);
		}
		
		public function set_cod_bebida($cod_bebida){
			$this->cod_bebida = $cod_bebida;
		}
		
		public function set_estoque($estoque){
			$this->estoque = $estoque;
		}
		
		public function get_cod_bebida(){
			return $this->cod_bebida;
		}
		
		public function get_estoque(){
			return $this->estoque;
		}
		
	}
		

?>