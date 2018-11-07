<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="select * FROM usuario WHERE id_usuario='$id'";
	
	$resultado=$mysqli->query($query);

	
?>

<html>
	<head>
		<title>Eliminar usuario</title>
	</head>
	
	<body>
		<center>
			<?php 
				if($resultado>0){
				?>
				
				<h1>Desea eliminar el Usuario: </h1><?php $row=$resultado->fetch_assoc();echo $row['nombre'];?>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Usuario</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			<input type="button" onclick=" location.href='eliminar.php?id=<?php echo $row['id_usuario'];?>' " value="Eliminar" name="boton" />
		</center>
	</body>
</html>
