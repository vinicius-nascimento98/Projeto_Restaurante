<?php
	
	include("ClassAtributos.php");

	class TextArea extends Atributos{

		public function set_tag(){
			$this->tag="<label>$this->label: </label><textarea name = '$this->name'></textarea>";
		}

		public function __construct($t){
			parent::__construct($t);

			$this->set_tag();
		}

	}
	
?>