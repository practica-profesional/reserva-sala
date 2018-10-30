<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="DELETE FROM citas WHERE id_citas='$id'";
	
	$resultado=$mysqli->query($query);
	echo $query;
?>

<html>
	<head>
		<title>Eliminar Cita</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Cita Eliminada</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Cita</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='Citas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
