<?php

    //incluindo as classes mesa e atendente
    include("ClassMesa.php");
    include("ClassAtendente.php");

    class Reserva{
        protected $nome_Cliente;
        protected $telefone;
        protected $data_Hora;
        protected $mesa;
        protected $atendente;

        protected function set_nome_Cliente($nome){
            $this->nome_Cliente=$nome;
        }

        protected function set_telefone($telefone){
            $this->telefone=$telefone;
        }

        protected function set_data_Hora($data){
            $this->data_Hora=$data;
        }

        //sera inserido um objeto da classe Mesa no atributo Mesa
        protected function set_mesa(Mesa $m){
            $this->mesa=$m;
        }

        //sera inserido um objeto da classe Atendente no atributo Atendente
        protected function set_atendente(Atendente $a){
            $this->atendente=$a;
        }

        public function get_nome_Cliente(){
            return($this->nome_Cliente);
        }

        public function get_telefone(){
            return($this->telefone);
        }

        public function get_data_Hora(){
            return($this->data_Hora);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_mesa(){
            return($this->mesa);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_atendente(){
            return($this->atendente);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Atendente e Mesa
        public function __construct($reserva, Mesa $m, Atendente $a){
            $this->set_nome_Cliente($reserva['nome_Cliente']);
            $this->set_telefone($reserva['telefone']);
            $this->set_data_Hora($reserva['data_Hora']);
            $this->set_mesa($m);
            $this->set_atendente($a);
        } 
    }

?>