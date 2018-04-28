<?php
include('Class_Item.php');

class Prato extends Item{
	protected $cod_prato;
	protected $ingrediente;
	
	public function __construct($prato, $ingrediente){
		parent:: __construct($prato);
		$this->ingrediente = array();
		foreach($ingrediente as $v){
			array_push($this->ingrediente, $v);
		}
	}
	
	public function set_cod_prato($cod_prato){
		$this->cod_prato = $cod_prato;
	}
	
	public function set_ingrediente($ingrediente){
		$this->ingrediente = $ingrediente;
	}
	
	public function get_cod_prato(){
		return($this->cod_prato);
	}
	
	public function get_ingrediente(){
		return($this->ingrediente);
	}
}

?>