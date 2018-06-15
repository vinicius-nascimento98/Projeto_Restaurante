<?php

    class Div implements Tag{
        protected $tag;
        protected $conteudo=array();
        protected $id;
        protected $class;
		protected $none;

        /*
            $tag-><div id='' class=''>conteudo</div>
            $conteudo->objetos que compõe o conteudo acima
            $id-> id da div
            $class-> class atribuidas a div
        */

        protected function set_id($id){
            $this->id = $id;
        }

        protected function set_class($class){
            $this->class = $class;
        }

        public function imprime_tag(){
            echo $this->tag;
        }
		
		public function set_none(){
            echo $this->none=true;
        }

        public function get_tag(){
			return($this->tag);
		}

        public function set_tag(){

            //primeira parte responsável por setar os atributos da DIV
            $this->tag.="<div ";

            if($this->id != null){
                $this->tag.="id='".$this->id."' ";
            }

            if($this->class != null){
                $this->tag.="class='".$this->class."' ";
            }
			
            if($this->none != null){
                $this->tag.="style='display:none' ";
            }

            $this->tag.="> ";

            //setando o conteudo da DIV
            foreach($this->conteudo as $v){

                $this->tag.= "".$v->get_tag()." ";
            }

            //fechando a DIV
            $this->tag.="</div>";

        }

        /*criar metodos para setar os atributos*/
        public function __construct($vetor_obj_conteudo,$atributos){
           
            if(isset($atributos['id'])){
                $this->set_id($atributos['id']);
            }

            if(isset($atributos['class'])){
                $this->set_class($atributos['class']);
            }

			if(isset($atributos['none'])){
                $this->set_none();
            }
			
            foreach ($vetor_obj_conteudo as $v) {
				array_push($this->conteudo, $v);
			}

            $this->set_tag();

        }

    }

?>