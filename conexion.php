<?php
$server="localhost";
//$server="mysql.hostinger.com.ar";
$user="u410159394_reser";
$bd="u410159394_reser";
$clave="sistemas";

$mysqli=new mysqli($server,$user,$clave,$bd);
$con = mysqli_connect("localhost", "u410159394_reser", "sistemas", "u410159394_reser") or die("Error " . mysqli_error($con));

//$mysqli=new mysqli("127.0.0.1","sistema","sistema","sistema"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>
