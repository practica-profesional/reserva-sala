<?php
	//include ('../login/control.php');
	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

	if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
		$nom=$_POST['busqueda'];

			$query="SELECT id_sala, nombre_sala, cant_max_pers, hora_inicio, hora_fin,
			salas.id_zona as id_z, creacion, color, nombre
			FROM salas INNER JOIN zonas ON salas.id_zona=zonas.id_zona where nombre_sala like '$nom%'";
	//echo $query;
	}
	else{
		$query="SELECT id_sala, nombre_sala, cant_max_pers, hora_inicio, hora_fin,
		salas.id_zona as id_z, creacion, color, nombre
		FROM salas INNER JOIN zonas ON salas.id_zona=zonas.id_zona";
	}
	//echo $query;
	$resultado=$mysqli->query($query);

?>

<html>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href='../../boostrap/css/bootstrap.min.css' rel='stylesheet'>
				<script src="../../boostrap/js/bootstrap.min.js"></script>
				<script src="../../bootstrap/js/jquery-1.10.2.js"></script>

		<title>S a l a s</title>

				<script type="text/javascript">
				
				function Confirmation() {

					if (confirm('Esta seguro de eliminar la sala?')==true) {
							//alert('El registro ha sido eliminado correctamente!!!');
							return true;
					}else{
							//alert('Cancelo la eliminacion');
							return false;
					}
				};


				</script>

	</head>
	<body>


		<!-- meter el menu header.php -->

			<?php
			require_once('../LoginPHP/header.php');
			?>

		<div class="container">
		<center><h1>S a l a s</h1></center>
		<!-- </div>
		<div id="filtros" style="float: right;"> -->
			<form class="form form-inline" role="form" action="" method="post">
				<div class="form-group col-md-3">
						<input type="button" class="btn btn-primary"
								onclick=" location.href='' "
								value="Nueva sala" name="boton" />
				</div>
				<div class="form-group form-group-justified col-md-9">
						<p> Busqueda por nombre de sala:
						<input type="text" name="busqueda">
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
							<th><b>Zona</b></th>
							<th><b>Color</b></th>
							<th><b>Hora inicio</b></th>
							<th><b>Hora fin</b></th>
							<th><b></b></th>
							<th><b></b></th>
						</tr>
						<tbody>
							<?php while($row=$resultado->fetch_assoc()){ ?>
								<tr>
									<td><?php echo $row['nombre_sala'];?>
									</td>
									<td>
										<?php echo $row['nombre'];?>
									</td>
									<td>
										<?php echo $row['color'];?>
									</td>
									<td>
										<?php echo $row['hora_inicio'];?>
									</td>
									<td>
										<?php echo $row['hora_fin'];?>
									</td>
									<td>
										<input type="button" class="btn btn-secondary"
										onclick=" location.href='modificar.php?id=<?php echo $row['id_sala'];?>' "
										value="Modificar" name="botonM" />
									</td>
									<td>



												 	<!--<input type="button" class="btn btn-secondary"
													onclick="return  mostrar_modal()"
													value="Eliminar" name="botonE" />-->
													<button type="button" class="btn btn-secondary"
													data-toggle="modal" data-target="#visualizar">
														Eliminar
													</button>



									</td>
								</tr>
							<?php } ?>
						</tbody>
				</table>
			</div>
		</div>

		<div  class="modal fade" id="visualizar"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="contenedor">
					<div class="modal-header">

						<form class="form-horizontal" method="POST" action="">
							<h4 class="modal-title text-center ustify-content-end">
								<input type="hidden" id="varID99" name="varID99" value=""/>
								<button type="submit" class="btn btn-danger pull-left" name="eliminar_sala" onclick="return Confirmation()">Eliminar</button>
								<button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							Datos de la sala</h4>
						</form>


						<!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
					</div>
					<div class="modal-body">
						<dl class="dl-horizontal">

						</dl>
					</div>
				</div>
			</div>
		</div>


	</body>

</html>
