<?php

	require('../../conexion.php');

	$id=$_GET['id'];

	$query="select * FROM usuario WHERE id_usuario='$id'";

	$resultado=$mysqli->query($query);


?>

<html>
	<head>
		<title>Eliminar usuario</title>
		<link rel="stylesheet" href="../../bootstrap/css/311/bootstrap.min.css" type="text/css" />

	</head>

	<body>
		<center>
			<?php
				if($resultado>0){
				?>

				<h1>Realmente desea eliminar el Usuario: </h1><br>
				<h3> <?php $row=$resultado->fetch_assoc();echo $row['nombre'] ?> </h3><br><br>

				<?php 	}else{ ?>

				<h1>Error al Eliminar Usuario</h1>

			<?php	} ?>
			<p></p>

			<input type="button"class="btn btn-primary" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" />
			<input type="button"class="btn btn-primary" onclick=" location.href='eliminar.php?id=<?php echo $row['id_usuario'];?>' " value="Eliminar" name="boton" />
		</center>
	</body>
</html>
