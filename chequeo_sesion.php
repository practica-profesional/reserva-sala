<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//header('Location: ../menu/index.php');
} else {
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "<br><a href='login.html' target='_parent'>Login</a>";
   //echo "<br><br><a href='index.html'>Registrarme</a>";

exit;
} 
?>