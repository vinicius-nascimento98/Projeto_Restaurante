<?php
	
	class Input extends Atributos{
		protected $id;
		protected $type;
		protected $required;
		protected $step;
		protected $onclick;
		
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
		
		public function set_onclick($onclick){
			$this->onclick = $onclick;
		}

		public function set_tag(){
			if($this->label!= null){
				$this->tag = "<label>$this->label: </label><input type='$this->type' name='$this->name' ";
			}
			else{
				$this->tag = "<input type='$this->type' name='$this->name' ";
			}
			if($this->id!=null){
				$this->tag .= " id='$this->id' ";
			}
			if($this->required){
				$this->tag .= " required ";
			}
			if($this->step!=null){
				$this->tag .= " step='".$this->step."' ";
			}
			if($this->onchange!=null){
				$this->tag .= " onchange='".$this->onchange."' ";
			}
			if($this->onclick!=null){
				$this->tag .= " onclick='".$this->onclick."' ";
			}
			if($this->value!=null){
				$this->tag .= " value='".$this->value."' ";
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
			
			if(isset($i["onclick"])){
				$this->set_onclick($i["onclick"]);
			}

			$this->set_tag();
		}
		
	}

?>