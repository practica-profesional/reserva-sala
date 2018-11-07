<?php 
	
	require('../conexion.php');
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$id=$_POST['dni'];
	$tipo=$_POST['tipo_dni_id_tp'];
	

	$query="UPDATE personas SET nombre='$nombre', apellido='$apellido', dni=$id ,tipo_dni_id_tp='$tipo'
			WHERE dni='$id'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar Persona</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Persona Modificada</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Persona</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<input type="button" onclick=" location.href='personas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
				
				