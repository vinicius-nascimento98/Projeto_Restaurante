<?php

  /*OBS.: utilizar cascate no banco de dados*/

  include ('Conexao.php');
  include ('Class/Control/ClassBD.php');
  
  $d = new BD($conn);

  $d->update($_POST);
  
?>
