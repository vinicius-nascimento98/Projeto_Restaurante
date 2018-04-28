<?php

    //incluindo as classes mesa e item
    include("ClassMesa.php");
    include("ClassItem.php");

    class Pedido{
        protected $data_Hora;
        protected $mesa;
        protected $sequencia=array();

        public function __construct($pedido, Mesa $m, Item $i){

            $this->set_data_Hora($pedido['data_Hora']);
            $this->set_mesa($m);
            $this->set_sequencia($i);
        }
    }

?>