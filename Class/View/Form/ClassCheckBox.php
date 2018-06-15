<?php

	include("ClassRadio.php");

	class Checkbox extends Radio{
		
		public function set_tag(){
			$this->tag="$this->label: ";

			foreach ($this->value as $i => $v) {
				$this->tag.="<br /><input type='checkbox' name='$this->name[]' value='$v' ";

				if($this->id!=null){
					$this->tag .= " id='$this->id' ";
				}
				
				if(in_array($v,$this->checked)){
					$this->tag.= "checked='checked' ";
				}

				$this->tag.= ">" . $this->labelTexto[$i] ;
			}
		}

		public function __construct($checkbox,$vetorCheckbox){
			parent::__construct($checkbox,$vetorCheckbox);

			$this->set_tag();
		}
	}
?>