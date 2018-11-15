<?php
	//include ('../login/control.php');
	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

		if (isset($_POST['eliminar_sala'])){
			$id_sala=$_POST['idsala'];

						$query="DELETE FROM salas WHERE id_sala='$id_sala'";
						$resultado=$mysqli->query($query);

						if($resultado>0){
							}else{ echo "<script>var variable=' . $id_sala . ';
							alert('No se puedo eliminar la sala: ' + variable);</script>";	}



		}elseif(isset($_POST['nueva_sala'])){

			$color=$_POST['color_sala'];
			$cant_pers_sala=$_POST['txtcantesala_new'];
			$hora_inicio_sala=$_POST['txtinisala_new'];
			$hora_fin_sala=$_POST['txtfinsala_new'];
			$nombre_sala=$_POST['txtnombresala_new'];
			$zona_sala=$_POST['zona_sala'];

			$query_nsala="INSERT INTO salas 	";
			$query_nsala=$query_nsala . "(nombre_sala, cant_max_pers, hora_inicio, hora_fin, id_zona, id_color)";
			$query_nsala=$query_nsala . " VALUES ('" . $nombre_sala . "', $cant_pers_sala, '" .$hora_inicio_sala. "', '" .$hora_fin_sala. "', $zona_sala, $color)";
			$resultado=$mysqli->query($query_nsala);

			if($resultado>0){
				}else{ echo "<script>var variable=' . $id_sala . ';
				alert('No se pudo crear la sala: ' + variable);</script>";	}
			//echo "<script>var variable=' . $query_nsala . ';alert('nueva sala xdxdxdxd =  ' + variable );</script>";


		}elseif(isset($_POST['modificar_sala'])){

			$hora_inicio_sala=$_POST['txtinisala_mod'];
			$hora_fin_sala=$_POST['txtfinsala_mod'];
			$nombre_sala=$_POST['txtnombresala_mod'];
			$id_sala=$_POST['idsala_mod'];

			$query="UPDATE salas SET nombre_sala='$nombre_sala', hora_inicio='$hora_inicio_sala', hora_fin='$hora_fin_sala'
					WHERE id_sala='$id_sala'";

			$resultado_mod=$mysqli->query($query);


			//echo "<script>alert('modificar sala jajajaaa');</script>";

		}else{
			//echo "<script>alert('listar salas');</script>";
		}
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
				function ConfirmationMod() {

					if (confirm('Esta seguro que desea modificar la sala?')==true) {
							//alert('El registro ha sido eliminado correctamente!!!');
							return true;
					}else{
							//alert('Cancelo la eliminacion');
							return false;
					}
				};
					function llenarSala(id,nombre, hora_ini, hora_fin){

						document.getElementById('idsala').value=id;
						document.getElementById('txtnombresala').value=nombre;
						document.getElementById('idsala_mod').value=id;
						document.getElementById('txtnombresala_mod').value=nombre;
						document.getElementById('txtinisala_mod').value=hora_ini;
						document.getElementById('txtfinsala_mod').value=hora_fin;

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




		<?php
		require_once('eliminar_sala.php');

		require_once('modificar_sala.php');

		require_once('nueva_sala.php');
		?>


	</body>

</html>
