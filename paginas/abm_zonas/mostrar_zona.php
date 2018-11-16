<?php
	//include ('../login/control.php');
	require('../../conexion.php');
	session_start();
	$categoria=$_SESSION['usr_cat'];
	$username=$_SESSION['usr_name'];

		if (isset($_POST['eliminar_zona'])){
			$id_zona=$_POST['idzona'];

						$query="DELETE FROM zonas WHERE id_zona='$id_zona'";
						$resultado=$mysqli->query($query);

						if($resultado>0){
							}else{ echo "<script>var variable=' . $id_zona . ';
							alert('No se puedo eliminar la zona: ' + variable);</script>";	}



		}elseif(isset($_POST['nueva_zona'])){


			$nombre_zona=$_POST['txtnombrezona_new'];
			$descripcion_zona=$_POST['txtdescrzona_new'];


			$query_nzona="INSERT INTO zonas 	";
			$query_nzona=$query_nzona . "(nombre_zona, descripcion)";
			$query_nzona=$query_nzona . " VALUES ('" . $nombre_zona . "','" . $descripcion_zona . "')";
			$resultado=$mysqli->query($query_nzona);

			if($resultado>0){
				}else{ echo "<script>var variable=' . $id_zona . ';
				alert('No se pudo crear la zona: ' + variable);</script>";	}



		}elseif(isset($_POST['modificar_zona'])){


			$nombre_zona=$_POST['txtnombrezona_mod'];
			$id_zona=$_POST['idzona_mod'];
			$descripcion_zona=$_POST['txtdescrzona_mod'];

			$query="UPDATE zonas SET nombre_zona='$nombre_zona', descripcion='$descripcion_zona'
					WHERE id_zona=$id_zona";

			$resultado_mod=$mysqli->query($query);




		}else{

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

					if (confirm('Esta seguro de eliminar la zona?')==true) {
							//alert('El registro ha sido eliminado correctamente!!!');
							return true;
					}else{
							//alert('Cancelo la eliminacion');
							return false;
					}
				};
				function ConfirmationMod() {

					if (confirm('Esta seguro que desea modificar la zona?')==true) {
							//alert('El registro ha sido eliminado correctamente!!!');
							return true;
					}else{
							//alert('Cancelo la eliminacion');
							return false;
					}
				};
					function llenarzona(id,nombre,descripcion){

						document.getElementById('idzona').value=id;
						document.getElementById('txtnombrezona').value=nombre;

						document.getElementById('idzona_mod').value=id;
						document.getElementById('txtnombrezona_mod').value=nombre;
						document.getElementById('txtdescrzona_mod').value=descripcion;

					}

				</script>

	</head>
	<body>


		<!-- meter el menu header.php -->

			<?php
			require_once('../LoginPHP/header.php');
			?>

			<?php
			require_once('lista_zonas.php');
			?>




		<?php
		require_once('eliminar_zona.php');

		require_once('modificar_zona.php');

		require_once('nueva_zona.php');
		?>


	</body>

</html>
