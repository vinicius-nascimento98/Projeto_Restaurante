<?php
	
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
				$this->tag .= " required ";
			}
			if($this->step!=null){
				$this->tag .= " step='".$this->step."' ";
			}

			$this->tag .= " />";
			
			if($this->pos_label!=null){
				$this->tag.="<label>".$this->pos_label."</label>";
			}
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

?>