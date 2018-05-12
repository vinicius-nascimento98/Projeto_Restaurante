<?php
	
	include("Interface.php");
	
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
?>