<?php

    //incluindo as classes mesa e atendente
    include("ClassMesa.php");
    include("ClassAtendente.php");

    class Reserva{
        protected $id_reserva;
        protected $nome_cliente;
        protected $telefone;
        protected $data_hora;
        protected $mesa;
        protected $atendente;

        protected function set_nome_cliente($nome){
            $this->nome_cliente=$nome;
        }

        protected function set_telefone($telefone){
            $this->telefone=$telefone;
        }

        protected function set_data_hora($data){
            $this->data_hora=$data;
        }

        //sera inserido um objeto da classe Mesa no atributo Mesa
        protected function set_mesa(Mesa $m){
            $this->mesa=$m;
        }

        //sera inserido um objeto da classe Atendente no atributo Atendente
        protected function set_atendente(Atendente $a){
            $this->atendente=$a;
        }

        protected function set_id_reserva($id){
            $this->id_reserva = $id;
        }

        public function get_nome_cliente(){
            return($this->nome_cliente);
        }

        public function get_telefone(){
            return($this->telefone);
        }

        public function get_data_hora(){
            return($this->data_hora);
        }

        //retorno o objeto contido no atributo e trato na página onde ele foi chamado
        public function get_mesa(){
            return($this->mesa);
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

        //retorna o cod_mesa guardado no próprio objeto de mesa
        public function get_cod_mesa(){
            return($this->mesa->get_id_mesa());
        }

        public function get_id_reserva(){
            return($this->id_reserva);
        }

        //tem de ser passado um POST com os dados, além do objeto da Classe Atendente e Mesa
        public function __construct($reserva, Mesa $m, Atendente $a){
            $this->set_nome_cliente($reserva['nome_cliente']);
            $this->set_telefone($reserva['telefone']);
            $this->set_data_hora($reserva['data_hora']);
            $this->set_id_reserva($reserva['id_reserva']);
            $this->set_mesa($m);
            $this->set_atendente($a);
        } 
    }

?>