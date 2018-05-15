<?php
	
	include("ClassAtributos.php");
	include("ClassCheckbox.php");
	include("ClassInput.php");
	include("ClassSelect.php");
	include("ClassTextArea.php");
	
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
			$this->submit = "<input type='submit' value='Enviar' />";
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