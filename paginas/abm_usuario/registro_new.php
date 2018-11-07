<?php
/*
$db_host="127.0.0.1";
$db_user="tpweb";
$db_password="tpweb999";


   $db_connection = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
}
*/
$db_name="tpweb";
$db_table_name="usuarios";

include("conexion.php");  
$db_connection = Conectarse();

$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_DNI = utf8_decode($_POST['DNI']);

$resultado=$db_connection->query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'");



if ($resultado->num_rows > 0)
{

header('Location: Fail.html');

} else {
	
$insert_value = "INSERT INTO " . $db_name . "." . $db_table_name . " (Nombre , Apellido , email , DNI) VALUES ('" . $subs_name . "', '" . $subs_last . "', '" . $subs_email . "', " . $subs_DNI . ")";


//echo $insert_value;

if ($db_connection->query($insert_value) === TRUE) {
    echo "Record inserted successfully";
    header('Location: Success.html');
} else {
    echo "Error inserting record: " . $db_connection->error;
    header('Location: Fail.html');
}

}

$db_connection->close;
		
?>
