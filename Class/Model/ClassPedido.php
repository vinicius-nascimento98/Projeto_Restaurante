<?php

    //incluindo as classes mesa e item
    include("ClassMesa.php");
    include("ClassItem.php");

    class Pedido{
        protected $data_hora;
        protected $mesa;
        protected $sequencia=array();
        protected $reserva;
        
        public function add_sequencia(Item $i){
            array_push($this->sequencia,$i);
        }

        public function set_data_hora($data_hora){
            $this->data_hora = $data_hora;
        }

        public function get_data_hora(){
            return ($this->data_hora);
        }

        public function set_mesa(Mesa $mesa){
            $this->mesa = $mesa;
        }

        public function set_reserva(Mesa $reserva){
            $this->reserva = $reserva;
        }

        //para instanciamento do objeto é esperado 3 objetos a partir das classes MEsa, Item e Reserva
        public function __construct($pedido, Mesa $m, Item $i, Reserva $r){

            $this->set_data_hora($pedido['data_hora']);
            $this->set_mesa($m);
            $this->set_reserva($r);
			//Pega a sequencia e o item para contruir.
            $this->add_sequencia($i);	
        }
		
    }

?>