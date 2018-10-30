<?php 
	
	require('../conexion.php');
		session_start();

	$contenido=$_POST['contenido'];
	$fecha=$_POST['fecha'];
	$prioridad=$_POST['prioridad_id_pr'];
	$publica=$_POST['publico'];
	$id_usuario=$_SESSION['id_usuario'];       
	$categoria=$_SESSION['categoria'];
	
	$query="INSERT INTO notas(contenido, fecha, prioridad_id_pr, publico, usuario_id_usuario, usuario_category_codigo) 
						 VALUES ('$contenido','$fecha','$prioridad', '$publica', '$id_usuario', '$categoria')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar Eventos</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0 ){ ?>
				

				<h1>Evento Guardado</h1>
				<?php }else{ ?>
				<h1>Error al Guardar el evento</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='eventos.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
