<?php

	class Vinho extends Item{
		protected $cod_vinho;
		protected $safra;
		protected $tipo_uva;
		protected $estoque;
		
		
		public function __construct($vinho){
			parent::__construct($vinho);
			if(isset($vinho["cod_vinho"])){
				$this->set_cod_vinho($vinho["cod_vinho"]);
			}
			$this->set_safra($vinho["safra"]);
			$this->set_tipo_uva($vinho["tipo_uva"]);
			$this->set_estoque($vinho["estoque"]);
		}
		
		public function set_cod_vinho($cod_vinho){
			$this->cod_vinho = $cod_vinho;
		}
		
		public function set_safra($safra){
			$this->safra = $safra;
		}
		
		public function set_tipo_uva($tipo_uva){
			$this->tipo_uva = $tipo_uva;
		}
		
		public function set_estoque($estoque){
			$this->estoque = $estoque;
		}
		
		public function get_cod_vinho(){
			return $this->cod_vinho;
		}
		
		public function get_id_ingrediente(){
			return $this->cod_vinho;
		}
		
		public function get_safra(){
			return $this->safra;
		}
		
		public function get_tipo_uva(){
			return $this->tipo_uva;
		}
		
		public function get_estoque(){
			return $this->estoque;
		}
		
	}
?>