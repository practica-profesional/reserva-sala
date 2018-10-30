<?php
	
	require('../conexion.php');
session_start();

	$primera_parte = "SELECT nombre, contenido,fecha,publico p.tipo ,publico  
						FROM notas n, usuario u 
						where n.usuario_id_usuario=u.id_usuario ";


	if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
		$nom=$_POST['busqueda'];

	$query="$primera_parte and nombre like '$nom%' order by fecha asc";
	//echo $query;
	}
	else{
	$query="$primera_parte order by fecha asc" ;
	} 
	
	$resultado=$mysqli->query($query);

	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Eventos</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body bgcolor="#FFCC90">

		<center><h1>Eventos</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='nuevo.evento.php'" value="nuevo evento" name="boton" />
		</div>
<div id="filtros" style="float: right;">
			<form action="eventos.php" method="post">
			<p> Busqueda por fecha: 
			<input type="text" name="busqueda">
			<button type="submit">Filtrar</button></p>
			</form>
		</div>	
		<p></p>


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Creado Por</b></th>
					<th><b>Contenido</b></th>
					<th><b>Fecha</b></th>
					<th><b>Prioridad</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['contenido'];?>
							</td>
							<td>
								<?php echo $row['fecha'];?>
							</td>
							<td>
								<?php echo $row['tipo'];?>
							</td>
							<td>
								<?php echo $row['publico'];?>
							</td>
							<td>

								<input type="button" onclick=" location.href='modificar.php?id=<?php echo $row['usuario_id_usuario'];?>' " value="Modificar" name="botonM" />
							</td>
							<td>
								<input type="button" onclick=" location.href='pre_eliminar.php?id=<?php echo $row['usuario_id_usuario'];?>' " value="Eliminar" name="botonE" />
							</td>
						</tr>
					<?php } ?>
				</tbody>