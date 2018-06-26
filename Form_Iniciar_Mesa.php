<?php

	date_default_timezone_set('America/Sao_Paulo');

	include("Class/View/Form/ClassForm.php");
	include("Cabecalho/Cabecalho.php");
    include("Class/Control/ClassBD.php");
	include("Conexao.php");

	echo "<h1> Iniciar Mesa </h1>";
	
	echo "<h2> Selecione as Mesas Disponíveis: </h2>";

	/*DEVERA TRAZER TODAS AS MESAS DISPONÍVEIS NAQUELE DIA E PREENCHELAS EM RADIOS,
	ELE DEVERA UTILIZAR O CADASTRO_RESERVA, UTILIZANDO CAMPOS HIDDEN TELEFONE E DATA_HORA*/

	//pegando a data atual
	$data_reserva = date('Y-m-d');
        
	$b = new BD($conn);

	$table = array('nome'=>'vw_mesareservada','condicao'=> "data_hora = '".$data_reserva."'");

	//verificando no banco de dados se existem mesas reservadas para a data inserida
	$retornoMesasReservadas = $b->select($table);

	/*caso o valor retornado for vazio, significa que não ha reservas naquela data,
	sendo assim seta-se a variavel table para um futuro SELECT ALL*/
	if(empty($retornoMesasReservadas)){
		$table = "mesa";    
	}
	/*caso seja retornado valores, significa que a reservas naquela data, sendo assim
	é serado a variavel com as condições para um futuro SELECT NOT IN */
	else{
		$table = array('nome'=>'mesa','condicao'=>'id_mesa NOT IN ( ');

            //montando condição responsável por trazer as mesas disponíveis para reserva naquela data
            $cont = 0;
            foreach($retornoMesasReservadas as $i=>$v){

				if($cont==0){
					$table['condicao'].= $v['cod_mesa'];
					$cont++;
				}
				else{
					$table['condicao'].= ','.$v['cod_mesa'];
				}
            }

            $table['condicao'].= ' )';//terminar verificação
	}

	//dando SELECT no banco de acordo com a variavel table setada
	$retornoMesasLivres = $b->select($table);

	if($retornoMesasLivres == null){
		echo "Não foram encontradas mesas disponiveis, <a href='Form_Lista_Espera.php?data_hora=$data_reserva'>clique aqui</a> para ir a tela de Lista de espera.";
	}
	else{

		//criando vetor de options para as mesas que estão livres no estabelecimento
		$opt1[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
		foreach($retornoMesasLivres as $v){
			$opt1[]= array("texto"=>$v['id_mesa']);
		}

		//instanciando os objetos options com o código das mesas livres
		foreach($opt1 as $v){
			$o[]= new Option($v);
		}

		//instanciando o objeto select passando os objetos option de mesas
		$select = array("nome"=>"cod_mesa", "label"=>"Mesas");
		$s = new Select($select, $o);

		//criando objeto input 1
		$i1 = array("label"=>"Cliente", "nome"=>"nome_cliente", "tipo"=>"text", "id"=>"campo_nome","required"=>true);
		$input1 = new Input($i1);

		//criando objeto input 2 que sera hiddin contendo o telefone
		$i2 = array("nome"=>"telefone", "tipo"=>"hidden", "id"=>"campo_telefone","value"=>"null");
		$input2 = new Input($i2);

		//criando objeto input 3 que sera hidden contendo a data
		$i3 = array("nome"=>"data_hora", "tipo"=>"hidden", "id"=>"campo_data","value"=>"$data_reserva");
		$input3 = new Input($i3);

		//criando objeto input 4
		$i4 = array("label"=>"Quantidade de pessoas", "nome"=>"qtd_pessoas", "tipo"=>"number", "id"=>"qtd_pessoa","required"=>true,"value"=>'1');
		$input4 = new Input($i4);

		//criando objeto input 3 que sera hidden contendo a inicialização da mesa para cadastrar no banco de dados
		$i5 = array("nome"=>"mesa_iniciada", "tipo"=>"hidden", "id"=>"mesa_iniciada","value"=>"1");
		$input5 = new Input($i5);

		//criando objeto input oculto para passar situação da reserva
		$i6 = array("nome"=>"reserva_finalizada", "tipo"=>"hidden", "id"=>"reserva_finalizada","value"=>"0");
		$input6 = new Input($i6);

		$table = "atendente";
        $atendentes = $b ->  select($table);

		//criando vetor de options
		$opt[0] = array("valor"=>"selecione","texto"=>"-- Selecione --");
		foreach($atendentes as $v){
			$opt[]= array("valor"=>$v['id_atendente'],"texto"=>$v['nome']);
		}

		//instanciando os objetos options
		foreach($opt as $v){
			$o2[]= new Option($v);
		}

		//instanciando o objeto select passando os objetos option de atendentes
		$select2 = array("nome"=>"cod_atendente", "label"=>"Atendente");
		$s2 = new Select($select2, $o2);

		//criando o form
		$f = array("nome"=>"cadastro_reserva", "action"=>"Cadastro_Reserva.php", "method"=>"post");
		$form = new Form($f);

		//adicionando os objetos input 1 e um textarea 1
		$form->add_input($input1);
		$form->add_input($input2);
		$form->add_input($input3);
		$form->add_input($input4);
		$form->add_input($input5);
		$form->add_input($input6);
		$form->add_select($s);
		$form->add_select($s2);

		//imprimindo o form
		$form->exibe_form();

	}

	echo "<h2> Selecione as Reservas: </h2>";

	if(empty($retornoMesasReservadas)){
		echo "Não existem mesas reservadas, por favor realize a reserva acima ou no <a href='Form_Reserva.php'>Cadastro Reserva</a>";
	}
	/*caso seja retornado valores, significa que a reservas naquela data, sendo assim
	é serado a variavel com as condições para um futuro SELECT NOT IN */
	else{
		
		$vet_radio = array();
		//concatenando jquery para poder ser passado o id do radio selecionado
		$location = "location.href= 'Iniciar_Mesa.php?id_reserva='+$(this).val();";

		//montando os paramentros do radio
		$r = array("label"=>"Mesas Reservadas","nome"=>"cod_mesa", "tipo"=>"radio","onchange"=>$location);
		
		//montando o vetor de radios
		foreach($retornoMesasReservadas as $v){
			
			if($v['mesa_iniciada'] != '1'){
				$vet_radio[$v['id_reserva']] = $v['cod_mesa'];
			}
		}

		$radio = new Radio($r, $vet_radio);

		$f2 = array("nome"=>"iniciar_mesa", "action"=>"Iniciar_Mesa.php?mesa_inicada=1", "method"=>"post");
		$form2 = new Form($f2);

		//adicionando os objetos input 1 e um textarea 1
		$form2->add_radio($radio);
		$form2->exibe_form();
	}

	/*DEVERA TRAZER TODAS AS MESAS RESERVADAS E PREENCHELAS EM RADIOS,
	ELE DEVERA REDIRECIONAR PARA FORM_PEDIDO.PHP*/

?>
<script src="Javascripts/jquery-2.2.4.min.js"></script>