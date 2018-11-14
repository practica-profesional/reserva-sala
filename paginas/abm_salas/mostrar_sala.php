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
					function llenarSala(id,nombre){
						document.getElementById('txtsala').value=id;
						document.getElementById('idsala').value=id;
						document.getElementById('txtnombresala').value=nombre;
						document.getElementById('idsala_mod').value=id;
						document.getElementById('txtnombresala_mod').value=nombre;
					}

				</script>

	</head>
	<body>


		<!-- meter el menu header.php -->

			<?php
			require_once('../LoginPHP/header.php');
			?>

			<?php
			require_once('lista_salas.php');
			?>


		<div  class="modal fade" id="eliminar"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="contenedor">
					<div class="modal-header">

						<form class="form-horizontal" method="POST" action="eliminar_sala.php">
							<h4 class="modal-title text-center ustify-content-end">
								<input type="hidden"  name="idsala" id="idsala" value="">
								<button type="submit" class="btn btn-danger pull-left" name="eliminar_sala"
								onclick="return Confirmation()">Eliminar</button>
								<button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							Datos de la sala</h4>
						</form>


						<!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
					</div>
					<div class="modal-body">
						<input type="text" disabled name="txtsala" id="txtsala" value="">
						<input type="text" disabled name="txtnombresala" id="txtnombresala" value="">
					</div>
				</div>
			</div>
		</div>


		<div  class="modal fade" id="modificar"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="contenedor_mod">
					<div class="modal-header">

						<form class="form-horizontal" method="POST" action="modificar_sala.php">
							<h4 class="modal-title text-center ustify-content-end">
								<input type="hidden"  name="idsala_mod" id="idsala_mod" value="">
								<button type="submit" class="btn btn-success pull-left" name="modificar_sala"
								onclick="return Confirmation()">Modificar</button>
								<button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							Datos de la sala</h4>



						<!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
					</div>
					<div class="modal-body">
						<input type="text"  name="txtnombresala" id="txtnombresala_mod" value="">
					</div>
					</form>
				</div>
			</div>
		</div>

	</body>

</html>
