<?php

	include('Class_Item.php');

	class Drink  extends Item{
		protected $cod_drink;
		protected $ingrediente;
		
		public function __construct($drink, $ingrediente){
			parent:: __construct($drink);
			$this->ingrediente = array();
			foreach($ingrediente as $v){
				array_push($this->ingrediente, $v);
			}
		}
		public function set_cod_drink($cod_drink){
			$this->cod_drink = $cod_drink;
		}
		
		public function set_ingrediente($ingrediente){
			$this->ingrediente = $ingrediente;
		}
		
		public function get_cod_drink(){
			return($this->cod_drink);
		}
		
		public function get_ingrediente(){
			return($this->ingrediente);
		}
		
	}
	
?>