<?php

	include("ClassAtributos.php");
	
	class Radio extends Atributos{
	protected $labelTexto = array();
	protected $value = array();
	protected $onchange;

	public function set_tag(){
		$this->tag="$this->label: ";

		foreach ($this->value as $i => $v) {
			$this->tag.="<input type='radio' name='$this->name' value='$v' ";
			
			//Adicionar onchange no Formulario que contenha radio ou checkbox caso use jQuery.
				if($this->onchange!=null){
					$this->tag .=" onchange='$this->onchange' ";
				}
			
			$this->tag.="> ".$this->labelTexto[$i];
		}
	}

	public function __construct($radio,$vetorRadio){
		parent::__construct($radio);
		
		foreach ($vetorRadio as $v=>$l) {
			array_push(	$this->labelTexto, $l);
			array_push($this->value, $v);
		}
		
		$this->set_tag();
	}
}

?>