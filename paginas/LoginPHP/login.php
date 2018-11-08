<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: ../../calendario/calendario-admin.php");
}

//**************revisar conexion a database ***************
include_once '../../conexion.php';

//Comprobar de envío el formulario
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($conexion, $_POST['email']);
	$password = mysqli_real_escape_string($conexion, $_POST['password']);
	$result = mysqli_query($conexion, "SELECT * FROM usuario WHERE email = '" . $email. "' and clave = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		//$_SESSION['usr_estado'] = $row['estado'];

		if($row['estado']==1){
			$_SESSION['usr_id'] = $row['id_usuario'];
			$_SESSION['usr_name'] = $row['nombre'];
			$_SESSION['usr_cat'] = $row['category_codigo'];


			header("Location: ../calendario/calendario-admin.php");

		}else
		$errormsg = "Esta cuenta esta desactivada";
	} else {
		$errormsg = "Revisa los datos!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de session</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="../../bootstrap/css/311/bootstrap311.min.css" type="text/css" />

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

</head>
<body>


<!-- meter el menu header.php -->

	<?php
	require_once('header.php');
	?>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					<!--div class="form-group clearfix">
						<img src="http://www.iconsfind.com/wp-content/uploads/2016/10/20161014_58006bff8b1de.png" alt="" width="200px" class="img-responsive img-circle" style="margin:0 auto">
					</div-->

					<div class="form-group">
						<label for="name">E-mail</label>
						<input type="text" name="email" placeholder="Ingresar Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Contraseña</label>
						<input type="password" name="password" placeholder="Ingresar Contraseña" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Iniciar Sesion" class="btn btn-primary" />
						<input type="reset" value="Limpiar" class="btn btn-default" >
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>

</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
