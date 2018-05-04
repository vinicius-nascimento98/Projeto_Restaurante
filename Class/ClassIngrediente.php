<?php

class Ingrediente {
	protected $id_ingrediente;
	protected $nome_ingrediente;
	protected $custo;
	protected $estoque;
	
	public function __construct($igrediente){
		$this->set_nome_ingrediente($ingrediente["nome_ingrediente"]);
		$this->set_custo($ingrediente["custo"]);
		$this->set_estoque($ingrediente["estoque"]);
		if(isset($i["id_ingrediente"])){
			$this->set_id_ingrediente($ingrediente["id_ingrediente"]);
		}
	}
	
	public function set_id_ingrediente($id_ingrediente){
		$this->id_ingrediente = $id_ingrediente;
	}
	
	public function set_nome_ingrediente($nome_Igrendiente){
		$this->nome_Igrendiente = $nome_Igrendiente;
	}
	
	public function set_custo($custo){
		$this->custo = $custo;
	}
	
	public function set_estoque($estoque){
		$this->estoque = $estoque;
	}
	
	public function get_estoque(){
		return($this->estoque);
	}
}
?>