<?php
	
	require('../conexion.php');
session_start();

$categoria=$_SESSION['categoria'];
	$username=$_SESSION['username'];


		$conte=$_POST['busqueda'];
		$fecha=$_POST['busqueda'];

		$query="SELECT id_notas, contenido, fecha FROM notas n, usuario u where n.id_usuario= u.id_usuario and nombre='$username'
	and (contenido like '%$conte%' or fecha like '$fecha%')";

	//$primera_parte = "SELECT nombre, contenido,fecha,publico p.tipo ,publico  
	//					FROM notas n, usuario u 
	//					where n.usuario_id_usuario=u.id_usuario ";


	//if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
	//	$nom=$_POST['busqueda'];

	//$query="$primera_parte and nombre like '$nom%' order by fecha asc";
	//echo $query;
	//}
	//else{
	//$query="$primera_parte order by fecha asc" ;
	//} 
	
	$resultado=$mysqli->query($query);
    echo  $query;
	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Notas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body bgcolor="#FFCC90">

		<center><h1>Notas</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='nueva_nota.php'" value="nuevo nota" name="boton" />
		</div>
<div id="filtros" style="float: right;">
			<form action="notas.php" method="post">
			<p> Busqueda por contenido o fecha: 
			<input type="text" name="busqueda">
			<button type="submit">Filtrar</button></p>
			</form>
		</div>	
		<p></p>


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Contenido</b></th>
					<th><b>Fecha</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
						<td>
								<?php echo $row['contenido'];?>
							</td>
							<td>
								<?php echo $row['fecha'];?>
							</td>
							<td>

								<input type="button" onclick=" location.href='modificar_notas.php?id=<?php echo $row['id_notas'];?>' " value="Modificar" name="botonM" />
							</td>
							<td>
								<input type="button" onclick=" location.href='pre_eliminar_notas.php?id=<?php echo $row['id_notas'];?>' " value="Eliminar" name="botonE" />
							</td>
						</tr>
					<?php } ?>
				</tbody>