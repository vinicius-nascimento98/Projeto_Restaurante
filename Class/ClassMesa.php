<?php

	class Mesa{
		protected $id_mesa;
		protected $status_mesa;
		
		
		public function __construct($mesa){
			if(isset($i["id_mesa"])){
				$this->set_id_mesa($mesa["id_mesa"]);
			}
			$this->set_status_mesa($mesa["status_mesa"]);
			
		}
		
		public function set_id_mesa($id_mesa){
			$this->id_mesa = $id_mesa;
		}
		
		public function set_status_mesa($status_mesa){
			$this->status_mesa = $status_mesa;
		}
		
		public function get_id_mesa(){
			return $this->id_mesa;
		}
		
		public function get_status_mesa(){
			return $this->status_mesa;
		}
		
	}
		

?>