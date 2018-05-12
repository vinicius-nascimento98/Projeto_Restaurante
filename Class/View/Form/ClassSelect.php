<?php
	
	include("ClassAtributos.php");
	include("ClassOption.php");

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

?>