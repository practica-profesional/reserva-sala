<?php


  $id_sala=$_POST['idsala'];

  //echo $id_sala;
  echo '<script>

  var variable=' . $id_sala . '; alert(variable);

  </script>';


header('Location: mostrar_sala.php');
 ?>
