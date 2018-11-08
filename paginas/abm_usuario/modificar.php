<?php

	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

	$id=$_GET['id'];

	$query="SELECT nombre, clave, email, category_codigo FROM usuario WHERE id_usuario='$id'";

	$resultado=$mysqli->query($query);

	$row=$resultado->fetch_assoc();

?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>

				<!-- meter el menu header.php -->

					<?php
					require_once('../LoginPHP/header.php');
					?>

		<center><h1>Modificar Usuario</h1></center>
			<div class="container">
				<span class="clearfix"></span>
				<div class="center-block">
				<div class="col-md-6 col-md-offset-3">

					<form class="form" name="modificar_usuario" method="POST" action="mod_usuario.php">

						<table class="table table-striped">
							<tr>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<td width="20"><b>Nombre Usuario:</b></td>
								<td width="30">
								<?php if ( $row['nombre'] == $username ){ ?>

									<input type="text" name="usuario" size="25" value="<?php echo $row['nombre']; ?>" disabled />

								<?php }else { ?>

									<input type="text" name="usuario" size="25" value="<?php echo $row['nombre']; ?>" />

								<?php } ?></td>
							</tr>
							<tr>
								<td><b>Password:</b></td>
								<td><input type="password" name="password" size="25" value=""
									required pattern=".{6,}" oninvalid="setCustomValidity('Campo obligatorio, debe contener minimo 6 caracteres')"/></td>
							</tr>
							<tr>
								<td><b>Confirmar Password:</b></td>
								<td><input type="password" name="password-conf" size="25" value=""
									required pattern=".{6,}" oninvalid="setCustomValidity('Campo obligatorio, debe contener minimo 6 caracteres')"/></td>
							</tr>
							<tr>
								<td><b>Email:</b></td>
								<td><input type="text" name="email" size="25" value="<?php echo $row['email']; ?>" /></td>
							</tr>
							<tr>
								<td><b>Categoria:</b></td>
								<td><input type="text" name="categoria" size="25" value="<?php echo $row['category_codigo']; ?>" /></td>
							</tr>

						</table>
						<center><input class="btn btn-secondary" type="submit" name="Guardar" value="Guardar" /></center><br>

						<center><input type="button" class="btn btn-secondary" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" /></center>

					</form>


				</div>
				</div>
			</div>
	</body>
</html>
