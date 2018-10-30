<?php 
	
	require('../conexion.php');
	
	$id=$_GET['id'];
	
	$query="DELETE FROM notas WHERE id_notas='$id'";
	
//echo $query." , ".$id;
	$resultado=$mysqli->query($query);
	echo $query;
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
				
				<h1>Nota Eliminada</h1>
				
				<?php 	}else{ ?>
				
				<h1>Error al Eliminar la nota</h1>
				
			<?php	} ?>
			<p></p>		
			
			<input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
</html>
