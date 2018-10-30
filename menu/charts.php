<?php 

$sql="select nombre, count(*) as cantidad from citas, usuario where citas.usuario_id_usuario=usuario.id_usuario group by nombre";

require('../conexion.php');
$resultado = $mysqli->query($sql);

echo $sql."<br><br><br>";

echo "nombre       ------       cantidad <br>";

$rows = array();
 while ($row1 = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
       echo $row1['nombre'] . "    ----    " . $row1['cantidad'] . "<br>";
       $row[0]=$row1['nombre'];
       $row[1]=$row1['cantidad'];
       array_push($rows,$row);
    }

            /*while (($row = $res->fetchRow())) {
            echo "{ label: ".$row[0].", y: ".$row[1]." },\n";
            }*/
print json_encode($rows, JSON_NUMERIC_CHECK);

?> 

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body>
       
        <br><br>
			
			<input type="button" onclick="location.href='inicio.php'" value="Regresar a inicio" name="botonREGr" />
    </body>
</html>