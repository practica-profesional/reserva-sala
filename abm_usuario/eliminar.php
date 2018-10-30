<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="DELETE FROM usuario WHERE id_usuario='$id'";
	
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
				
				<h1>Usuario Eliminado</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar Usuario</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
