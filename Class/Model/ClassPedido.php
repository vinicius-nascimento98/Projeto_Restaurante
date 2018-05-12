<?php

    //incluindo as classes mesa e item
    include("ClassMesa.php");
    include("ClassItem.php");

    class Pedido{
        protected $data_hora;
        protected $mesa;
        protected $sequencia=array();

        public function __construct($pedido, Mesa $m, Item $i){

            $this->set_data_hora($pedido['data_hora']);
            $this->set_mesa($m);
			//Pega a sequencia e o item para contruir.
            array_push($this->sequencia,$i);	
        }
		
		public function set_sequencia(Item $i){
            $this->sequencia=$i;
        }
		
		//Terminar set's
    }

?>