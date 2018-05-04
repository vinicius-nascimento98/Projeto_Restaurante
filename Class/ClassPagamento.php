<?php

    //incluindo a classe mesa
    include("ClassMesa.php");

    class Pagamento{
        protected $data_hora;
        protected $mesa;
        protected $forma_pagamento;
        protected $operadora;
        protected $desconto;

        public function set_data_hora($data){
            $this->data_hora=$data;
        }

        //sera inserido um objeto da classe Mesa no atributo Mesa
        public function set_mesa(Mesa $m){
            $this->mesa=$m;
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

        public function get_data_hora(){
            return($this->data_hora);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_mesa(){
            return($this->mesa);
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

        //tem de ser passado um POST com os dados, além do objeto da Classe Mesa
        public function __construct($pagamento, Mesa $m){

            $this->set_data_hora($pagamento['data_hora']);
            $this->set_mesa($m);
            $this->set_forma_pagamento($pagamento['forma_pagamento']);
            $this->set_operadora($pagamento['operadora']);
            $this->set_desconto($pagamento['desconto']);
        }
    }

?>