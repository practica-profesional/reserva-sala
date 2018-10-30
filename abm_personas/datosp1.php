	<?php
	require('../conexion.php');
    session_start();
	if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
		$nom=$_POST['busqueda'];
	$query="SELECT  datos_personales_id_dp,datos_personales_2_id_dp2,usuario_id_usuario,usuario_category_codigo,personas_dni FROM p_dp where nombre like '$nom%' order by nombre desc";
	//echo $query;
	}
	else{
	$query="SELECT  datos_personales_id_dp,datos_personales_2_id_dp2,usuario_id_usuario,usuario_category_codigo,personas_dni FROM p_dp where nombre like '$nom%' order by nombre desc";
	}
	$resultado=$mysqli->query($query);

	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body>
	
		<center><h1>Personas</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='.php'" value="Datos Personales1" name="boton" />
			<input type="button" onclick=" location.href='.php'" value="Datos Personales2" name="boton" />
		</div>
		<div style="float: left;">
			<input type="button" onclick=" location.href='personas.php'" value="Regresar" name="boton" />
				</div>
<div id="filtros" style="float: right;">
			<form action="personas.php" method="post">
			<p> Busqueda por Nombre: 
			<input type="text" name="busqueda">
			<button type="submit">Filtrar</button></p>
			</form>
		</div>	
		<p></p>


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Datos Personales</b></th>
					<th><b>Datos Personales2</b></th>
					<th><b>id Usuario</b></th>
					<th><b>Categoria de Usuario</b></th>
					<th><b>Persona DNI</b></th>					
					


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>

						<tr>
							<td><?php echo $row['datos_personales_id_dp'];?>
							</td>
							<td>
								<?php echo $row['datos_personales_2_id_dp2'];?>
							</td>
							<td>
								<?php echo $row['usuario_id_usuario'];?>
							</td>
							<td>
								<?php echo $row['usuario_category_codigo'];?>
							</td>	
							<td>
								<?php echo $row['personas_dni'];?>
							</td>	
							<td>

								
							</td>
							<td>
								
							</td>
						</tr>
					<?php } ?>
				</tbody>