<?php
	//include ('../login/control.php');
	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

		if (isset($_POST['eliminar_sala'])){
			$id_sala=$_POST['idsala'];

//						$query="DELETE FROM salas WHERE id_sala='$id_sala'";
						$query="DELETE FROM salas WHERE id_sala='5'";
						$resultado=$mysqli->query($query);

						if($resultado>0){
							}else{ echo "<script>var variable=' . $id_sala . ';
							alert('No se puedo eliminar la sala: ' + variable);</script>";	}



		}elseif(isset($_POST['modificar_sala'])){
			echo "<script>alert('modificar sala jajajaaa');</script>";

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




		<?php
		require_once('eliminar_sala.php');

		require_once('modificar_sala.php');
		?>


	</body>

</html>
