<?php

  /*OBS.: utilizar cascate no banco de dados*/

  include ('Conexao.php');
  include ('Class/Control/ClassBD.php');

  $d = new BD($conn);

  $d->delete($_GET);

  //redirecionando usuário após a remoção no banco de dados
  /*1. str_place interno- troca os _ da string por "espaço"
    2. ucwords interno- troca as primeiras letras de cada palavra para maiuscula
    3. str_replace externo- troca os "espaço" da string por _ */
  header("location: Listar_". str_replace(" ","_",ucwords(str_replace("_"," ",$_GET[tabela]))) . ".php");
?>