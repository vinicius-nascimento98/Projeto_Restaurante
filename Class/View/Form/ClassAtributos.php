
<?php

	include("InterfaceTag.php");
	
	abstract class Atributos implements Tag{
		protected $label;
		protected $name;
		protected $tag;
		protected $pos_label;
		protected $value;


		public function set_label($label){
			$this->label=$label;
		}
		
		public function set_name($nome){
			$this->name=$nome;
		}

		public function get_tag(){
			return($this->tag);
		}

		public function imprime_tag(){
			echo $this->tag;
		}
		
		public function set_pos_label($posLabel){
			$this->pos_label=$posLabel;
		}
		
		public function set_value($valor){
			$this->value=$valor;
		}

		public function __construct($atributos){
			if(isset($atributos['label'])){
				$this->set_label($atributos['label']);
			}
			if(isset($atributos['value'])){
				$this->set_value($atributos['value']);
			}
			
			$this->set_name($atributos['nome']);
			
			if(isset($atributos['pos_label'])){
				$this->set_pos_label($atributos['pos_label']);
			}
		}
	}

?>