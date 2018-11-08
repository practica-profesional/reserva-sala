<?php

	require('../../conexion.php');

	$id=$_POST['id'];
	$nombre=$_POST['usuario'];
	$password=md5($_POST['password']);
	$email=$_POST['email'];
	$categoria=$_POST['categoria'];

			if ($_POST['password']!=$_POST['password-conf']){
				echo "<script>
				                alert('Las claves deben coincidir');
				                window.location= 'modificar.php?id=' + $id
				    </script>";

			}


//echo $id . " - " . $nombre . " - " . $password . " - " . $email . " - " . $categoria;

	$query="UPDATE usuario SET nombre='$nombre', clave='$password', email='$email', category_codigo='$categoria'
			WHERE id_usuario='$id'";

	$resultado=$mysqli->query($query);

?>

<html>
	<head>
		<title>Modificar usuario</title>
		<link rel="stylesheet" href="../../bootstrap/css/311/bootstrap.min.css" type="text/css" />

	</head>

	<body>
		<center>

			<?php
				if($resultado>0){
				?>

				<h1>Usuario Modificado</h1>

					<?php 	}else{ ?>

				<h1>Error al Modificar Usuario</h1>

			<?php	} ?>

			<p></p>

			<input type="button" class="btn btn-secondary" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />

		</center>
	</body>
</html>
