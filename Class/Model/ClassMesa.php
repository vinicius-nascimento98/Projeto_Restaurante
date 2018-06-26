<?php

	class Mesa{
		protected $id_mesa;
		
		public function __construct($mesa){
			if(isset($mesa["id_mesa"])){
				$this->set_id_mesa($mesa["id_mesa"]);
			}	
		}
		
		public function set_id_mesa($id_mesa){
			$this->id_mesa = $id_mesa;
		}
		
		public function get_id_mesa(){
			return $this->id_mesa;
		}
		
	}
		
?>