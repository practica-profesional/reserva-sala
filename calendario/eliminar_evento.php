<?php
session_start();

//Fichero de conexion con l base de datos
include_once("db.php");

$varID=$_POST['varID99'];

$consulta_eventos = "SELECT id, titulo, color, inicio, fin FROM mis_eventos where id = $varID";
$resultado_eventos = mysqli_query($conexion, $consulta_eventos);
$registro=mysqli_fetch_assoc($resultado_eventos);
$consulta_borrado = "DELETE FROM mis_eventos WHERE id = $varID";
$resultado_borrado = mysqli_query($conexion, $consulta_borrado);

//$msg="El evento " . $registro['titulo'] .  " con id: " . $registro['id'] . "  fue eliminado correctamente. ";

 if($resultado_borrado>0){
    $msg="El evento con título:   " . $registro['titulo'] . "   fue eliminado correctamente. ";
  }else{
    $msg="El evento  con título:   " . $registro['titulo'] . "    NO se pudo eliminar, por favor verifique lo sucedido.";
  }

//$bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");
$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>$msg<button
type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
header("Location: calendario-admin.php");

?>
