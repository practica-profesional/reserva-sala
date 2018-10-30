<?
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["loggedin"] != true) {
//si no existe, va a la página de autenticacion
header("Location: login.php");
//salimos de este script
exit();
}
?> 
