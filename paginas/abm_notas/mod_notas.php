<?php 
	
	require('../conexion.php');
	
	$id=$_POST['id'];
	$contenido=$_POST['contenido'];
	$fecha=$_POST['fecha'];

	$query="UPDATE notas SET contenido='$contenido', fecha='$fecha'
			WHERE id_notas='$id'";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Modificar Notas</title>
	</head>
	
	<body>
		<center>
			
			<?php 
				if($resultado>0){
				?>
				
				<h1>Notas Modificado</h1>
				
					<?php 	}else{ ?>
				
				<h1>Error al Modificar Notas</h1>
				
			<?php	} ?>
			
			<p></p>	
			
			<input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
				
				