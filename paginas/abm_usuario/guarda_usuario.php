<?php


	require('../../conexion.php');

	$usuario=$_POST['usuario'];
	$password=md5($_POST['password']);
	$email=$_POST['email'];
	$cat=$_POST['categoria'];


	$query="INSERT INTO usuario (nombre, email, clave, category_codigo)
						 VALUES ('$usuario','$email', '$password', '$cat')";

						 /*if (!mysqli_query($mysqli, $query))
						   {
						   echo("Error description: " . mysqli_error($mysqli));
						 }else{
							 echo "todo bien";
						 }*/


	//$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<title>Guardar usuario</title>
		<link rel="stylesheet" href="../../bootstrap/css/311/bootstrap.min.css" type="text/css" />

	</head>
	<body>
		<center>

			<?php if (!mysqli_query($mysqli, $query)) { ?>
				<h1>Error al Guardar Usuario</h1>
				<?php
				//echo $mysqli->insert_id;
				}else{ ?>
				<h1>Usuario guardado</h1>
			<?php	} ?>

			<p></p>

			<input class="btn btn-secondary" type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />

		</center>
	</body>
	</html>
