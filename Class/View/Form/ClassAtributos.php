<?php

	include("Interface.php");
	
	abstract class Atributos implements Tag{
		protected $label;
		protected $name;
		protected $tag;
		protected $pos_label;


		public function set_label($l){
			$this->label=$l;
		}
		
		public function set_name($nome){
			$this->name=$nome;
		}

		public function imprime_tag(){
			echo $this->tag;
		}
		
		public function set_pos_label($pl){
			$this->pos_label=$pl;
		}

		public function __construct($atributos){
			if(isset($atributos["label"])){
				$this->set_label($atributos['label']);
			}
			$this->set_name($atributos['nome']);
			if(isset($atributos['pos_label'])){
				$this->set_pos_label($atributos['pos_label']);
			}
		}
	}
?>