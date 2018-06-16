<pre>
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
	$data_reserva =  date('Y-m-d');
        
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
		foreach($retornoMesasReservadas as $i=>$v){

			if($i==0){
				$table['condicao'].= $v['cod_mesa'];
			}
			else{
				$table['condicao'].= ','.$v['cod_mesa'];
			}
		}

		$table['condicao'].= ' )';
	}

	//dando SELECT no banco de acordo com a variavel table setada
	$retornoMesasLivres = $b->select($table);

	print_r($retornoMesasLivres);

	echo "<h2> Selecione as Reservas: </h2>";

	/*DEVERA TRAZER TODAS AS MESAS RESERVADAS E PREENCHELAS EM RADIOS,
	ELE DEVERA REDIRECIONAR PARA FORM_PEDIDO.PHP*/

?>
</pre>