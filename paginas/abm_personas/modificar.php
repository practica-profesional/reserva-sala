<?php
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="SELECT nombre, apellido, dni,tipo_dni_id_tp  FROM personas WHERE dni='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	
?>

<html>
	<head>
		<title>Persona</title>
	</head>
	<body>
		
		<center><h1>Modificar Persona</h1></center>
		
		<form name="modificar_persona" method="POST" action="mod_personas.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Nombre Persona:</b></td>
					<td width="30"><input type="text" name="persona" size="25" value="<?php echo $row['nombre']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>Apellido:</b></td>
					<td><input type="text" name="apellido" size="25" value="<?php echo $row['apellido']; ?>" /></td>
				</tr>
				<tr>
					<td><b>dni</b></td>
					<td><input type="text" name="dni" size="25" value="<?php echo $row['dni']; ?>" /></td>
				</tr>
				<tr>
					<td><b>tipo Dni</b></td>
					<td><input type="text" name="tipo_dni_id_tp" size="25" value="<?php echo $row['tipo_dni_id_tp']; ?>" /></td>
				</tr>				
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="button" onclick=" location.href='personas.php' " value="Regresar" name="boton" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
