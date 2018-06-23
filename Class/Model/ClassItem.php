<?php

	abstract class Item {
	protected $id_item;
	protected $descricao;
	protected $custo;
	protected $disponibilidade;
	protected $tipo;
	
	public function __construct ($item){
		$this->set_descricao($item['descricao']);
		
		if(isset($d["disponibilidade"])){
			$this->set_disponibilidade($item['disponibilidade']);
		}
		
		if(isset($c["custo"])){
			$this->set_custo($item['custo']);
		}
		
		if(isset($i["id_item"])){
			$this->set_id_item($item["id_item"]);
		}

		if(isset($item['tipo'])){
			$this->set_tipo($item['tipo']);
		}
	}
	
	public function set_id_item($id_item){
		$this->id_item = $id_item;
	}

	public function set_disponibilidade($disponibilidade){
		$this->disponibilidade = $disponibilidade;
	}
	
	public function set_descricao($descricao){
		$this->descricao = $descricao;
	}
	
	public function set_custo($custo){
		$this->custo = $custo;
	}
	
	public function set_tipo($tipo){
		$this->tipo = $tipo;
	}
	
	public function get_id_item(){
		return($this->id_item);
	}
	
	public function get_descricao(){
		return($this->descricao);
	}
	
	public function get_custo(){
		return($this->custo);
	}
	
	public function get_tipo(){
		return($this->tipo);
	}

	public function get_disponibilidade(){
		return($this->disponibilidade);
	}
	
}
?>