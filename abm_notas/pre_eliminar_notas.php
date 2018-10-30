<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="select * FROM notas WHERE id_notas='$id'";
	
	$resultado=$mysqli->query($query);

	
?>

<html>
	<head>
		<title>Eliminar nota</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Desea eliminar la nota: </h1><?php $row=$resultado->fetch_assoc();echo $row['contenido']." , ".$row['fecha'];?>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar la nota</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" />
			<input type="button" onclick=" location.href='eliminar_notas.php?id=<?php echo $row['id_notas'];?>' " value="Eliminar" name="boton" />
		</center>
	</body>
</html>
