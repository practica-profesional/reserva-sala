<?php
require('../conexion.php');
	session_start();
	$id_usuario=$_SESSION['id_usuario'];       
	$categoria=$_SESSION['categoria'];
$sql="SELECT * from prioridad";
$resultado = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['id_pr']."'>".$row['tipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$mysqli->close(); //cerramos la conexión
?>

<html>
	<head>
		<title>Crear Evento</title>
	</head>
	<body>
		
		<center><h1>Nuevo Evento</h1></center>
		
		<form name="nuevo.evento" method="POST" action="guarda_eventos.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Contenido</b></td>
					<td width="30"><input type="text" name="contenido" size="25" /></td>
				</tr>
				<tr>
					<td><b>Fecha</b></td>
					<td><input type="text" name="fecha" size="25" /></td>
				</tr>
				<tr>
					<td><b>Prioridad</b></td>
					<td><select name="prioridad_id_pr" >
       					<?php echo $combobit; ?>
   					</select> 

   						<?php echo $id_usuario.$categoria; ?>
   						<?php echo "" ;?>

   					</td>

				</tr>
				<td><b>Publica (0 para no,1 para si)</b></td>
					<td><input type="text" name="publico" size="25" /></td>
				</tr>
					<!--<td><input type="text" name="categoria" size="5" /></td>-->
					
				
				<tr>
					<td colspan="2"><center><input type="submit" name="enviar" value="Registrar" /></center></td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="button" onclick=" location.href='eventos.php' " value="Regresar" name="boton" /></center></td>
				</tr>


			</table>
		</form>
	</body>
</html>						
