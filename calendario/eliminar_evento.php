<?php
session_start();

//Fichero de conexion con l base de datos
include_once("db.php");

$consulta_eventos = "SELECT id, titulo, color, inicio, fin FROM mis_eventos where id = ";
$resultado_eventos = mysqli_query($conexion, $consulta_eventos);






$msg="elimianr un id de evento " . $_POST["varID99"] . "  " . $_POST["varConfirmacion"];

//$bd  = $conexion->query("SELECT * FROM eventos WHERE id=$id");
$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>$msg<button
type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
header("Location: index.php");

?>
