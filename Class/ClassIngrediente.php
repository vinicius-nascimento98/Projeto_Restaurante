<?php

class Ingrediente {
	protected $id_Ingrediente;
	protected $nome_Ingrediente;
	protected $custo;
	protected $estoque;
	
	public function __construct($igrediente){
		$this->set_nome_Ingrediente($ingrediente["nome_Igrendiente"]);
		$this->set_custo($ingrediente["custo"]);
		$this->set_estoque($ingrediente["estoque"]);
		if(isset($i["id_Igrendiente"])){
			$this->set_id_Ingrediente($ingrediente["id_Igrendiente"]);
		}
	}
	
	public function set_id_Ingrediente($id_Igrendiente){
		$this->id_Igrendiente = $id_Igrendiente;
	}
	
	public function set_nome_Ingrediente($nome_Igrendiente){
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