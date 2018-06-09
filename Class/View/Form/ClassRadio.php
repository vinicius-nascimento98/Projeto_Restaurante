<?php
	
	class Radio extends Atributos{
	protected $labelTexto = array();
	protected $checked;
	

	public function set_tag(){
		$this->tag="$this->label: ";

		foreach ($this->value as $i => $v) {
			
			$this->tag.="<input type='radio' name='$this->name' value='$v'";

			if($this->checked == $v){
				$this->tag.="checked='checked' ";
			}

			//Adicionar onchange no Formulario que contenha radio ou checkbox caso use jQuery.
			if($this->onchange!=null){
				$this->tag .=" onchange='$this->onchange' ";
			}
			
			$this->tag.="> ".$this->labelTexto[$i];
		}
	}

	public function __construct($radio,$vetorRadio){
		
		$this->value = array();
		
		if(isset($vetorRadio['checked'])){
			$this->checked = $vetorRadio['checked'];
		}
		
		parent::__construct($radio);
		
		//verificar 
		foreach ($vetorRadio as $v=>$l) {
			array_push(	$this->labelTexto, $l);
			array_push($this->value, $v);
		}
		
		$this->set_tag();
	}
}

?>