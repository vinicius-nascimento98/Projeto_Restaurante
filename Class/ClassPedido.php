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
            $this->set_sequencia($i);
        }
    }

?>