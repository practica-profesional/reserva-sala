<?php 
	
	require('../conexion.php');
	
	$id_cita=$_POST['id'];
	$contenido=$_POST['contenido'];
	$fechaini=$_POST['fecha_ini'];
	$horaini=$_POST['hora_ini'];
	$horafin=$_POST['hora_fin'];
	$prioridad=$_POST['prioridad_cod_pr'];
	$publico=$_POST['publico'];
	

	$query="UPDATE citas SET contenido='$contenido', fecha_ini='$fechaini', hora_ini='$horaini', hora_fin='$horafin', prioridad_cod_pr='$prioridad', publico='$publico'
			WHERE id_citas='$id_cita'";
	
	$resultado=$mysqli->query($query);
	echo $query;
?>

<html>
	<head>
		<title>Modificar Cita</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Cita Modificada</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Cita</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<input type="button" onclick=" location.href='Citas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>