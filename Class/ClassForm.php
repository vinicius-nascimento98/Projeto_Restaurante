<?php
include("Interface.php");

abstract class Atributos implements Tag{
	protected $label;
	protected $name;
	protected $tag;

	public function set_label($l){
		$this->label=$l;
	}
	
	public function set_name($nome){
		$this->name=$nome;
	}

	public function imprime_tag(){
		echo $this->tag;
	}

	public function __construct($atributos){
		$this->set_label($atributos['label']);
		$this->set_name($atributos['nome']);
	}
}

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

class Checkbox extends Radio{
	
	public function set_tag(){
		$this->tag="$this->label: ";

		foreach ($this->value as $i => $v) {
			$this->tag.="<input type='checkbox' name='$this->name' value='$v'> ".$this->labelTexto[$i];
		}
	}

	public function __construct($checkbox,$vetorCheckbox){
		parent::__construct($checkbox,$vetorCheckbox);

		$this->set_tag();
	}
}

class Option implements Tag{
	protected $value;
	protected $texto;
	protected $tag;

	public function set_tag(){
		$this->tag="<option";
		
		if($this->value != null){
			$this->tag.=" value='$this->value'";
		}

		$this->tag.=">";

		$this->tag.="$this->texto</option>";
	}

	public function get_tag(){
		return($this->tag);
	}

	public function set_value($value){
		$this->value=$value;
	}

	public function set_texto($texto){
		$this->texto=$texto;
	}

	public function __construct($option){
		$this->set_texto($option['texto']);
		
		if(isset($option['valor'])){
			$this->set_value($option['valor']);
		}

		$this->set_tag();
	}
}

//adicionar o atributo multiple
class Select extends Atributos{
	protected $option;

	public function add_option(Option $o){
		$pos=sizeof($this->option);

		$this->option[$pos]=$o;
	}

	public function set_tag(){
		$this->tag="<label>$this->label: </label><select name='$this->name'>";

		foreach($this->option as $o){
			$this->tag .= $o->get_tag();
		}

		$this->tag.="</select>";
	}

	public function __construct($select, $vetorOption){
		parent::__construct($select);	
		foreach ($vetorOption as $o) {
			$this->add_option($o);
		}
		$this->set_tag();
	}
}

class TextArea extends Atributos{

	public function set_tag(){
		$this->tag="<label>$this->label: </label><textarea name = '$this->name'></textarea>";
	}

	public function __construct($t){
		parent::__construct($t);

		$this->set_tag();
	}

}

class Input extends Atributos{
	protected $id;
	protected $type;
	protected $required;
	protected $step;
	
	public function set_type($tipo){
		$this->type=$tipo;
	}	

	public function set_id($id){
		$this->id=$id;
	}

	public function set_required($obrigatorio){
		$this->required = $obrigatorio;
	}

	public function set_step($step){
		$this->step = $step;
	}

	public function set_tag(){
		$this->tag = "<label>$this->label: </label><input type='$this->type' name='$this->name' ";
		
		if($this->id!=null){
			$this->tag .= " id='$this->id' ";
		}
		if($this->required){
			$this->tag .= " required='required' ";
		}
		if($this->step!=null){
			$this->tag .= " step='".$this->step."' ";
		}

		$this->tag .= " />";
	}

	public function __construct($i){
		parent::__construct($i);

		$this->set_type($i["tipo"]);

		if(isset($i["id"])){
			$this->set_id($i["id"]);
		}

		if(isset($i["step"])){
			$this->set_step($i["step"]);
		}

		if(isset($i["required"])){
			$this->set_required($i["required"]);
		}

		$this->set_tag();
	}
	
}


class Form{
	
	//obrigatório no construtor.
	protected $submit;	
	protected $entrada;	
	protected $name;	
	protected $action;
	protected $method;
	protected $legenda;
	
	public function __construct($f){
		$this->set_name($f["nome"]);
		$this->set_action($f["action"]);
		$this->set_method($f["method"]);
		$this->submit = "<input type='submit' value='Enviar' name='submeter ' />";
	}
	
	protected function set_name($n){
		$this->name=$n;
	}

	protected function set_action($a){
		$this->action=$a;
	}

	protected function set_method($m){
		$this->method=$m;
	}

	public function add_input(Input $i){

		$pos = sizeof($this->entrada);
		$this->entrada[$pos] = $i;
	}

	public function add_textArea(TextArea $t){

		$pos=sizeof($this->entrada);
		$this->entrada[$pos]=$t;
	}

	public function add_select(Select $s){
		
		$pos=sizeof($this->entrada);
		$this->entrada[$pos]=$s;
	}

	public function add_radio(Radio $r){
		
		$pos=sizeof($this->entrada);
		$this->entrada[$pos]=$r;	
	}

	public function add_checkbox(Checkbox $c){

		$pos=sizeof($this->entrada);
		$this->entrada[$pos]=$c;
	}
	
	public function exibe_form(){
		echo "<form name='$this->name' action='$this->action' method='$this->method'>";
		echo "<fieldset>";
		if($this->entrada != null){
			foreach($this->entrada as $e){
				echo "<p>";	
				$e->imprime_tag();
				echo "</p>";
			}
		}
		echo "<p>";
		echo $this->submit;
		echo "</p>";

		echo "</fieldset>";
		echo "</form>";
	}
	
}

?>