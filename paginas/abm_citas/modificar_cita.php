<?php
	
	require('../conexion.php');
	session_start();
	
	//$categoria=$_SESSION['categoria'];

	$id=$_GET['id'];

	
	$query="SELECT id_citas, contenido, fecha_ini,publico, hora_ini, hora_fin, prioridad_cod_pr, pe.nombre as nombre1 
	FROM citas c, usuario u , prioridad p , personas pe, p_dp 
	where c.usuario_id_usuario=u.id_usuario and c.prioridad_cod_pr=p.cod_pr  and c.personas_pdp_id=p_dp.p_dp_id 
	and pe.dni=p_dp.personas_dni 
 	and id_citas= '$id' order by fecha_ini asc ";

	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();


	$sql="SELECT * from prioridad";
$resultado2 = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($resultado2->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row2 = $resultado2->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row2['cod_pr']."'>".$row2['tipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
	

echo $row['contenido']."      ".$row['nombre1']."<br>";	
echo $query;
?>


<html>
	<head>
		<title>Citas </title>
	</head>
	<body>
		
		<center><h1>Modificar Citas</h1></center>
		
		<form name="modificar_cita" method="POST" action="mod_cita.php"> <!-- no lo perdas -->
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Contenido:</b></td>
					<td width="30"><input type="text" name="contenido" size="25" value="<?php echo $row['contenido']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>Dia:</b></td>
					<td><input type="text" name="fecha_ini" size="25" value="<?php echo $row['fecha_ini']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Hora Inicio:</b></td>
					<td><input type="text" name="hora_ini" size="25" value="<?php echo $row['hora_ini']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Hora Fin:</b></td>
					<td><input type="text" name="hora_fin" size="25" value="<?php echo $row['hora_fin']; ?>" /></td>
				</tr>
				<td><b>Prioridad</b></td>
					<td><select name="prioridad_cod_pr" >
       					<?php echo $combobit; ?>
   					</select>			
				<tr>
				<tr>
					<td><b>Publica:</b></td>
					<td><input type="text" name="publico" size="25" value="<?php echo $row['publico']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Persona</b></td>
					<td><?php echo $row['nombre1']; ?></td>
				</tr>

					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="button" onclick=" location.href='Citas.php' " value="Regresar" name="boton" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
