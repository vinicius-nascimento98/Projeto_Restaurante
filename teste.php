<pre>
<?php

    include("Class/ClassBD.php");
    include("Class/ClassAtendente.php");
    include("Class/ClassTable.php");
    include("Conexao.php");
    
    $table="atendente";

    $b=new BD($conn);

    $retorno = $b->select($table);
    
    //criando vetor de objetos
	foreach($retorno as $v){
		$a[] = new Atendente($v);
	}

    //criando vetor de cabecalho
    foreach($retorno[0] as $i=>$v){
        $cabecalho[]=$i;
    }

    $h=new Thead($cabecalho);
    $b=new Tbody($cabecalho);

    foreach($a as $v){
        $b->add_body($v);
    }

    print_r($b);

    //get_object_vars([objeto]) -> retorna um vetor de atributos do objeto
?>
</pre>