<?php

class Ingrediente {
	protected $id_ingrediente;
	protected $nome_ingrediente;
	protected $custo;
	protected $estoque;
	
	public function __construct($ingrediente){
		$this->set_nome_ingrediente($ingrediente["nome_ingrediente"]);
		$this->set_custo($ingrediente["custo"]);
		$this->set_estoque($ingrediente["estoque"]);
		if(isset($ingrediente["id_ingrediente"])){
			$this->set_id_ingrediente($ingrediente["id_ingrediente"]);
		}
	}
	
	public function set_id_ingrediente($id_ingrediente){
		$this->id_ingrediente = $id_ingrediente;
	}
	
	public function set_nome_ingrediente($nome_Ingrediente){
		$this->nome_ingrediente = $nome_Ingrediente;
	}
	
	public function set_custo($custo){
		$this->custo = $custo;
	}
	
	public function set_estoque($estoque){
		$this->estoque = $estoque;
	}
	
	public function get_id_ingrediente(){
		return($this->id_ingrediente);
	}
	
	public function get_nome_ingrediente(){
		return($this->nome_ingrediente);
	}
	
	public function get_custo(){
		return($this->custo);
	}
	
	public function get_estoque(){
		return($this->estoque);
	}
	
}
?>