<?php

    class Lista_Espera{
        protected $nome_cliente;
        protected $ordem;
        protected $data_espera;
        protected $telefone;
        protected $atendente;
        
        protected function set_nome_cliente($nome){
            $this->nome_cliente=$nome;
        }

        protected function set_ordem($ordem){
            $this->ordem=$ordem;
        }

        protected function set_data_espera($data){
            $this->data_espera=$data;
        }

        protected function set_telefone($telefone){
            $this->telefone=$telefone;
        }

        //sera inserido um objeto da classe Atendente no atributo Atendente
        protected function set_atendente(Atendente $a){
            $this->atendente=$a;
        }

        public function get_nome_cliente(){
            return($this->nome_cliente);
        }

        public function get_ordem(){
            return($this->ordem);
        }

        public function get_data_espera(){
            return($this->data_espera);
        }

        public function get_telefone(){
            return($this->telefone);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_atendente(){
            return($this->atendente);
        }

        /*GAMBIARRA?*/
        //retorna o nome do atendente guardado no próprio objeto de atendente
        public function get_nome(){
            return($this->atendente->get_nome());
        }

        public function get_id_espera(){
            return($this->telefone);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Atendente
        public function __construct($list_espera, Atendente $a){
            $this->set_nome_cliente($list_espera['nome_cliente']);
            $this->set_ordem($list_espera['ordem']);
            $this->set_data_espera($list_espera['data_espera']);
            $this->set_telefone($list_espera['telefone']);
            $this->set_atendente($a);            
        }
    }

?>