<?php

    //incluindo a classe mesa
    include("ClassPedido.php");

    class Pagamento{
        protected $data_hora;
        protected $pedido;
        protected $forma_pagamento;
        protected $operadora;
        protected $desconto;
        protected $total;
        protected $cod_reserva;

        public function set_data_hora($data){
            $this->data_hora=$data;
        }

        //sera inserido um objeto da classe Pedido no atributo Pedido
        public function set_pedido(Pedido $p){
            $this->pedido=$p;
        }

        public function set_forma_pagamento($forma_pagamento){
            $this->forma_pagamento=$forma_pagamento;
        }

        public function set_operadora($operadora){
            $this->operadora=$operadora;
        }

        public function set_desconto($desconto){
            $this->desconto=$desconto;
        }
		
		public function set_total($total){
            $this->total=$total;
        }
		
		public function set_cod_reserva($cod_reserva){
            $this->cod_reserva=$cod_reserva;
        }
		
        public function get_data_hora(){
            return($this->data_hora);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_pedido(){
            return($this->pedido);
        }

        public function get_forma_pagamento(){
            return($this->forma_pagamento);
        }

        public function get_operadora(){
            return($this->operadora);
        }

        public function get_desconto(){
            return($this->desconto);
        }
		
		public function get_total(){
            return($this->total);
        }
		
		public function get_cod_reserva(){
            return($this->cod_reserva);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Mesa
        public function __construct($pagamento, Pedido $p){

            $this->set_data_hora($pagamento['data_hora']);
            $this->set_pedido($p);
            $this->set_forma_pagamento($pagamento['forma_pagamento']);
            $this->set_operadora($pagamento['operadora']);
            $this->set_desconto($pagamento['desconto']);
            $this->set_total($pagamento['total']);
            $this->set_cod_reserva($pagamento['cod_reserva']);
        }
    }

?>