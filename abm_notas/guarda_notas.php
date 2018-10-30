<?php 
	
	require('../conexion.php');
		session_start();

	$contenido=$_POST['contenido'];
	$fecha=$_POST['fecha'];
	$id_usuario=$_SESSION['id_usuario'];       
	
	
	$query="INSERT INTO notas(contenido, fecha, id_usuario) 
						 VALUES ('$contenido','$fecha','$id_usuario')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar Notas</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0 ){ ?>
				

				<h1>Nota Guardada</h1>
				<?php }else{ ?>
				<h1>Error al Guardar la nota</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
