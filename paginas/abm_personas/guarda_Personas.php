<?php 
	
	require('../conexion.php');
	
	$dni1=$_POST['dniprueba'];
	//$dniprueba=$_POST['dniprueba'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$codigo=$_POST['codigo'];


	$query="INSERT INTO personas (dni, nombre, apellido, tipo_dni_codigo) VALUES ($dni1,'$nombre','$apellido',$codigo)";
	
	$resultado=$mysqli->query($query);
	echo $query;
	//echo "  ,  " . $dniprueba;
?>

<html>
	<head>
		<title>Guardar Persona</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Persona Guardada</h1>
				<?php }else{ ?>
				<h1>Error al Guardar Persona</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick="location.href='nuevo_per.php?dni=<?php echo  $dni1; ?>'" value="Regresar" name="botonREGr" />
			
		</center>
	</body>
	</html>	
