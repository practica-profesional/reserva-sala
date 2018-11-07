<?php
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="SELECT contenido, fecha FROM notas WHERE id_notas='$id'";
	
	$resultado=$mysqli->query($query);
	
	$row=$resultado->fetch_assoc();
	echo $id;
?>

<html>
	<head>
		<title>Notas</title>
	</head>
	<body>
		
		<center><h1>Modificar notas</h1></center>
		
		<form name="modificar_notas" method="POST" action="mod_notas.php">
			
			<table width="50%">
				<tr>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="20"><b>Contenidp:</b></td>
					<td width="30"><input type="text" name="contenido" size="25" value="<?php echo $row['contenido']; ?>" /></td>
				</tr>	
				<tr>
					<td><b>Fecha:</b></td>
					<td><input type="text" name="fecha" size="25" value="<?php echo $row['fecha']; ?>" /></td>
				</tr>			
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
