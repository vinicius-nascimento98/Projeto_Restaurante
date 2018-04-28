<?php

    //incluindo a classe atendete
    include('ClassAtendente.php');

    class Lista_Espera{
        protected $nome_Cliente;
        protected $ordem;
        protected $data_Hora;
        protected $telefone;
        protected $atendente;
        
        protected function set_nome_Cliente($nome){
            $this->nome_Cliente=$nome;
        }

        protected function set_ordem($ordem){
            $this->ordem=$ordem;
        }

        protected function set_data_Hora($data){
            $this->data_Hora=$data;
        }

        protected function set_telefone($telefone){
            $this->telefone=$telefone;
        }

        //sera inserido um objeto da classe Atendente no atributo Atendente
        protected function set_atendente(Atendente $a){
            $this->atendente=$a;
        }

        protected function get_nome_Cliente(){
            return($this->nome_Cliente);
        }

        protected function get_ordem(){
            return($this->ordem);
        }

        protected function get_data_Hora(){
            return($this->data_Hora);
        }

        protected function get_telefone(){
            return($this->telefone);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        protected function get_atendente(){
            return($this->atendente);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Atendente
        public function __construct($list_espera, Atendente $a){
            $this->set_nome_Cliente($list_espera['nome_Cliente']);
            $this->set_ordem($list_espera['ordem']);
            $this->set_data_Hora($list_espera['data_Hora']);
            $this->set_telefone($list_espera['telefone']);
            $this->set_atendente($a);            
        }
    }

?>