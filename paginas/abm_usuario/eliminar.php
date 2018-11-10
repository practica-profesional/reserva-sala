<?php

	require('../../conexion.php');

	$id=$_GET['id'];

	$query="DELETE FROM usuario WHERE id_usuario='$id'";

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

				<h1>El usuario fue eliminado <?php $id ?> </h1>

				<?php 	}else{ ?>

				<h1>Error al Eliminar Usuario <?php echo $query?></h1>

			<?php	} ?>
			<p></p>

			<input type="button" class="btn btn-primary" onclick=" location.href='mostrar.php' "
			value="Regresar" name="boton" />

		</center>
	</body>
</html>
