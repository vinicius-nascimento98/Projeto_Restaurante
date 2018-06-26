<?php

	class Atendente{
		protected $id_atendente;
		protected $nome;
		protected $comissao;
		
		public function __construct($atendente){
			if(isset($atendente["id_atendente"])){
				$this->set_id_atendente($atendente["id_atendente"]);
			}
			$this->set_nome($atendente["nome"]);
			$this->set_comissao($atendente["comissao"]);
		}
		
		public function set_id_atendente($id_atendente){
			$this->id_atendente = $id_atendente;
		}
		
		public function set_nome($nome){
			$this->nome = $nome;
		}
		
		public function set_comissao($comissao){
			$this->comissao = $comissao;
		}
		
		public function get_id_atendente(){
			return $this->id_atendente;
		}
		
		public function get_nome(){
			return $this->nome;
		}
		
		public function get_comissao(){
			return $this->comissao;
		}
	}
		

?>