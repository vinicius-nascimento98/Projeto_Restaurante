<?php

abstract class Item {
	protected $id_item;
	protected $descricao;
	protected $custo;
	protected $tipo;
	
	public function __construct ($item){
		if(isset($i["id_item"])){
			$this->set_id_item($item["id_item"]);
		}
		$this->set_descricao($item['descricao']);
		$this->set_custo($item['custo']);
		$this->set_tipo($item['tipo']);
	}
	
	public function set_id_item($id_item){
		$this->id_item = $id_item;
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
	
}
?>