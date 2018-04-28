<?php

    //incluindo a classe mesa
    include("ClassMesa.php");

    class Pagamento{
        protected $data_Hora;
        protected $mesa;
        protected $forma_Pagamento;
        protected $operadora;
        protected $desconto;

        public function set_data_Hora($data){
            $this->data_Hora=$data;
        }

        //sera inserido um objeto da classe Mesa no atributo Mesa
        public function set_mesa(Mesa $m){
            $this->mesa=$m;
        }

        public function set_forma_Pagamento($forma_Pagamento){
            $this->forma_Pagamento=$forma_Pagamento;
        }

        public function set_operadora($operadora){
            $this->operadora=$operadora;
        }

        public function set_desconto($desconto){
            $this->desconto=$desconto;
        }

        public function get_data_Hora(){
            return($this->data_Hora);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_mesa(){
            return($this->mesa);
        }

        public function get_forma_Pagamento(){
            return($this->forma_Pagamento);
        }

        public function get_operadora(){
            return($this->operadora);
        }

        public function get_desconto(){
            return($this->desconto);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Mesa
        public function __construct($pagamento, Mesa $m){

            $this->set_data_Hora($pagamento['data_Hora']);
            $this->set_mesa($m);
            $this->set_forma_Pagamento($pagamento['forma_Pagamento']);
            $this->set_operadora($pagamento['operadora']);
            $this->set_desconto($pagamento['desconto']);
        }
    }

?>