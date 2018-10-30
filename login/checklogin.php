<?php
session_start();
?>

<?php
include_once "../conexion.php";



if ($mysqli->connect_error) {
 die("La conexion falló: " . $mysqli->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE nombre = '$username' and clave = '$password'";

$result = $mysqli->query($sql);
//echo '<div class="error">'.$result->num_rows.'</div>';

if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 //echo '<div class="error">'.$password.' '.$row['clave'].'</div>';
 if ($password==$row['clave']) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['categoria'] = $row['category_codigo'];
    $_SESSION['id_usuario']=$row['id_usuario'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    //$_SESSION['expire'] = $_SESSION['start'] + (1 * 20);

    echo "Bienvenido! " . $_SESSION['username'];
    //echo "<br><br><a href=control.php>Panel de Control</a>";
    header('Location: ../menu/index.php');
 

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($mysqli); 
 ?>
 
