<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="select * FROM citas WHERE id_citas='$id'";
	
	$resultado=$mysqli->query($query);

	
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
				
				<h1>¿Desea eliminar la cita?: </h1><?php $row=$resultado->fetch_assoc();echo $row['contenido'];?>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Cita</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='Citas.php' " value="Regresar" name="boton" />
			<input type="button" onclick=" location.href='eliminar_cita.php?id=<?php echo $row['id_citas'];?>' " value="Eliminar" name="boton" />
		</center>
	</body>
</html>
