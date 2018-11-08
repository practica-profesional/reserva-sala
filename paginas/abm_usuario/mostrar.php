<?php
	//include ('../login/control.php');
	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

	if((isset($_POST['busqueda']) && $_POST['busqueda']<>'')or(isset($_POST['busquedaXcategoria']) && $_POST['busquedaXcategoria']<>'')){
		$nom=$_POST['busqueda'];
		$cat=$_POST['busquedaXcategoria'];

	/*$query="SELECT id_usuario, nombre, email, category_codigo FROM usuario
			where nombre like '$nom%' or category_codigo = '$cat'";*/
	$query="SELECT id_usuario, u.nombre as nombre, email, c.nombre as categoria FROM usuario u, category c
			WHERE c.codigo = u.category_codigo AND (u.nombre LIKE  '$nom%' and c.nombre like '$cat%')";
	//echo $query;
	}
	else{
	$query="SELECT id_usuario, u.nombre as nombre, email, c.nombre as categoria FROM usuario u, category c
			WHERE c.codigo = u.category_codigo and u.category_codigo >= '$categoria'";
	}
	//echo $query;
	$resultado=$mysqli->query($query);

?>

<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Usuarios</title>
	<!-- <link rel="stylesheet" type="text/css" href="../tablas.css" media="screen"> -->
	</head>
	<body>


		<!-- meter el menu header.php -->

			<?php
			require_once('../LoginPHP/header.php');
			?>

		<div class="container">
		<center><h1>Usuarios</h1></center>
		<!-- </div>
		<div id="filtros" style="float: right;"> -->
			<form class="form form-inline" role="form" action="mostrar.php" method="post">
				<div class="form-group col-md-3">
						<input type="button" class="btn btn-primary"
								onclick=" location.href='nuevo.php' "
								value="Nuevo usuario" name="boton" />
				</div>
				<div class="form-group form-group-justified col-md-9">
						<p> Busqueda por nombre:
						<input type="text" name="busqueda">
						y/o categoria:
						<input type="text" name="busquedaXcategoria">
						<button type="submit" class="btn btn-primary">Filtrar</button></p>
				</div>
			</form>
		</div>

		<div class="container">
			<div class="table-hover table-responsive">
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th ><b>Nombre</b></th>
							<th><b>Email</b></th>
							<th><b>Categoria</b></th>
							<th><b>Modificar</b></th>
							<th><b>Eliminar</b></th>
						</tr>
						<tbody>
							<?php while($row=$resultado->fetch_assoc()){ ?>
								<tr>
									<td><?php echo $row['nombre'];?>
									</td>
									<td>
										<?php echo $row['email'];?>
									</td>
									<td>
										<?php echo $row['categoria'];?>
									</td>
									<td>
										<input type="button" class="btn btn-secondary"
										onclick=" location.href='modificar.php?id=<?php echo $row['id_usuario'];?>' "
										value="Modificar" name="botonM" />
									</td>
									<td>

										<?php if ( $row['nombre'] != $username ){ ?>

												 	<input type="button" class="btn btn-secondary"
													onclick=" location.href='pre_eliminar.php?id=<?php echo $row['id_usuario'];?>' "
													value="Eliminar" name="botonE" />


										<?php } ?>

									</td>
								</tr>
							<?php } ?>
						</tbody>
				</table>
			</div>
		</div>
	</body>
	<script src="../boostrap/js/bootstrap.min.js"></script>
</html>
