<?php
$server="localhost:3900";
//$server="mysql.hostinger.com.ar";	
$user="u569784351_agen";
$bd="u569784351_agen";
$clave="sistemas999";

$con = mysql_connect("localhost",$user,$clave);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($bd, $con);

$sql="select nombre, count(*) as cantidad from citas, usuario where citas.usuario_id_usuario=usuario.id_usuario group by nombre";

$result = mysql_query("SELECT name, val FROM web_marketing");

echo $sql."<br><br><br>";

echo "nombre       ------       cantidad <br>";

$rows = array();
while($r = mysql_fetch_array($result)) {
	echo $r['nombre'] . "    ----    " . $r['cantidad'] . "<br>";
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);

?> 
