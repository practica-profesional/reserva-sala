<?php
session_start();

//Fichero de conexion con l base de datos
include_once("../../conexion.php");

$tit=$_GET['t'];
$varID=$_GET['id'];
$varInicio=$_GET['inicio'];
$varFin=$_GET['fin'];
//$varTpo_uso=$_GET['tipo_uso'];
//$varQuien=$_GET['quien'];

/*
$consulta_eventos = "SELECT id, titulo, color, inicio, fin FROM mis_eventos where id = $varID";
$resultado_eventos = mysqli_query($conexion, $consulta_eventos);
$registro=mysqli_fetch_assoc($resultado_eventos);
$consulta_borrado = "DELETE FROM mis_eventos WHERE id = $varID";
$resultado_borrado = mysqli_query($conexion, $consulta_borrado);
*/
/*
UPDATE table_name
SET column1 = value1, column2 = value2...., columnN = valueN
WHERE [condition];
*/
$dataInicio = explode("T", $varInicio);
$dataFin = explode("T", $varFin);

$fechaInicio=$dataInicio[0] . " " . $dataInicio[1];
$fechaFin=$dataFin[0] . " " . $dataFin[1];

$consulta_mod = "UPDATE mis_eventos  SET inicio = '". $fechaInicio ."', fin = '" . $fechaFin . "' WHERE id = $varID";

$resultado_mod = mysqli_query($conexion, $consulta_mod);

if($resultado_mod>0){
   $msg="El evento: " . $tit . " -- " . $varID . " -- " . $fechaInicio . " -- " . $fechaFin . " fue modificado correctamente.";
   $tipo_alerta='alert alert-success';
 }else{
   $msg="El evento  con título:   " . $registro['titulo'] . "    NO se pudo modificar, por favor verifique lo sucedido.";
   $tipo_alerta='alert alert-danger';
 }


 //$msg="El evento: " . $tit . " -- " . $varID . " -- " . $fechaInicio . " -- " . $fechaFin . " fue modificado correctamente.";
//$msg=$consulta_mod;



/*
 if($resultado_borrado>0){
    $msg="El evento con título:   " . $registro['titulo'] . "   fue eliminado correctamente. ";
  }else{
    $msg="El evento  con título:   " . $registro['titulo'] . "    NO se pudo eliminar, por favor verifique lo sucedido.";
  }
*/


//$bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");
/*
$_SESSION['mensaje'] = "<div class='$tipo_alerta' role='alert'>$msg<button
type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
*/
header("Location: calendario-admin.php");


?>
