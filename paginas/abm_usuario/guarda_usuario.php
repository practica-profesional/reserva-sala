<?php 
	
	require('../conexion.php');
	
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$cat=$_POST['categoria'];


	$query="INSERT INTO usuario (nombre, email, clave, category_codigo) 
						 VALUES ('$usuario','$email', '$password', '$cat')";
	
	$resultado=$mysqli->query($query);
	
?>

<html>
	<head>
		<title>Guardar usuario</title>
	</head>
	<body>
		<center>	
			
			<?php if($resultado>0){ ?>
				<h1>Usuario Guardado - </h1>
				<?php
				//echo $mysqli->insert_id;
				}else{ ?>
				<h1>Error al Guardar Usuario</h1>		
			<?php	} ?>		
			
			<p></p>	
			
			<input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			
		</center>
	</body>
	</html>	
