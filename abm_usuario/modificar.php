<?php
	
	require('../conexion.php');
	session_start();
	$categoria=$_SESSION['categoria'];
	$username=$_SESSION['username'];

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
		
		<center><h1>Modificar Usuario</h1></center>
		
		<form name="modificar_usuario" method="POST" action="mod_usuario.php">
			
			<table width="50%">
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
					<td><input type="password" name="password" size="25" value="<?php echo $row['clave']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Email:</b></td>
					<td><input type="text" name="email" size="25" value="<?php echo $row['email']; ?>" /></td>
				</tr>
				<tr>
					<td><b>Categoria:</b></td>
					<td><input type="text" name="categoria" size="25" value="<?php echo $row['category_codigo']; ?>" /></td>
				</tr>				
				<tr>
					<td colspan="2"><center><input type="submit" name="Guardar" value="Guardar" /></center></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" /></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>	
