<?php
session_start();
require('../../conexion.php');

$id_usuario=$_SESSION['usr_id'];
$usuario_cat=$_SESSION['usr_cat'];
$consulta_cat="SELECT * from category where codigo >= '" . $usuario_cat . "'";
$resultado_cat=mysqli_query($conexion, $consulta_cat);

if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC))
    {
        $combobit .=" <option value='".$row['codigo']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$mysqli->close(); //cerramos la conexión
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
		<center><h1>Nuevo Usuario</h1></center>
<div class="container">


    <span class="clearfix"></span>
    <div class="center-block">
    <div class="col-md-6 col-md-offset-3">
		<form name="nuevo_usuario" method="post" action="guarda_usuario.php">
			<div class="table-hover table-responsive">
			<table class="table table-striped" width="50%">
				<tr>
					<td width="20"><b>Nombre</b></td>
					<td width="30"><input type="text" name="usuario" size="25" /></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" size="25" /></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><input type="email" name="email" size="25" /></td>
				</tr>
				<tr>
					<td><b>Categoria</b></td>
					<!--<td><input type="text" name="categoria" size="5" /></td>-->
					<td>
            <select class="form-control" id="categoria" name="categoria" style="width: 95%;">
                <?php
                      while($registros_cat = mysqli_fetch_array($resultado_cat))
                    {
                        echo '<option value="'. $registros_cat['nombre'] .'">'.$registros_cat['nombre'].'</option>';
                    }

                $mysqli->close(); //cerramos la conexión
                ?>
   					</select>
          </td>
				</tr>
			</table>

				<center><input class="btn btn-secondary" type="submit"
					name="enviar" value="Registrar" /></center><br>


			<center><input class="btn btn-secondary" type="button"
				onclick=" location.href='mostrar.php' " value="Regresar" name="boton" /></center>




		</div>
		</form>
    </div>
    </div>
</div>
	</body>
</html>
