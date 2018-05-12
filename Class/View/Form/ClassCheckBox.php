<?php

	include("ClassRadio.php");

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
?>