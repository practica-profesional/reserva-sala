<?php
/*
$servername="127.0.0.1";
$username="tpweb";
$password="tpweb999";
$dbname="tpweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/

include("conexion.php");  
$conn = Conectarse();
$subs_DNI = utf8_decode($_POST['DNI']);
$db_table_name="usuarios";

$sql = "SELECT * FROM ".$db_table_name." WHERE DNI = '".$subs_DNI."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border=1 width='60%' center><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>DNI</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["Nombre"]. "</td><td>" . $row["Apellido"]. "</td><td>" . $row["email"]. "</td><td>" . $row["DNI"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
