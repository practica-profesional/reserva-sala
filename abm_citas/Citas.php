<?php
	
	include ('../login/control.php');
	require('../conexion.php');
session_start();
	$categoria=$_SESSION['categoria'];
	$username=$_SESSION['username'];


		$nom=$_POST['busqueda'];
		$conte=$_POST['contenido'];
		$fecha=$_POST['busqueda'];
		$horaini=$_POST['hora'];
		$horafin=$_POST['hora'];
		$tipo=$_POST['tipo'];
		$public=$_POST['busquedaxpubl'];
		$personas=$_POST['personas'];


$query="select * from (

SELECT id_citas, u.nombre as nusuario, c.contenido, c.fecha_ini, c.publico, c.hora_ini, c.hora_fin, p.tipo as ptipo, per.nombre as npersona FROM citas c, usuario u, prioridad p, personas per, p_dp WHERE c.usuario_id_usuario = u.id_usuario AND c.prioridad_cod_pr = p.cod_pr AND c.personas_pdp_id = p_dp.p_dp_id and p_dp.personas_dni=per.dni and( u.category_codigo >= 9 and publico = 1)

UNION

SELECT id_citas, u.nombre as nusuario, c.contenido, c.fecha_ini, c.publico, c.hora_ini, c.hora_fin, p.tipo as ptipo, per.nombre as npersona FROM citas c, usuario u, prioridad p, personas per, p_dp WHERE c.usuario_id_usuario = u.id_usuario AND c.prioridad_cod_pr = p.cod_pr AND c.personas_pdp_id = p_dp.p_dp_id and p_dp.personas_dni=per.dni

and ( u.nombre = '$username' ) ) tabla1

WHERE (contenido like '%$conte%' and (hora_ini like '$horaini%' or hora_fin like '$horafin%') and tabla1.ptipo like '$tipo%' and tabla1.npersona like '$personas%'  and publico like '$public%' and (tabla1.nusuario like '$nom%' or fecha_ini like '$fecha%')) 

order by  publico , fecha_ini asc ";


	echo $query ;//. "    ,    " . $username;
	$resultado=$mysqli->query($query);
	?>
	


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Citas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body bgcolor="#FFCC99">
	
		<center><h1>Citas</h1></center>

<div style="float: left;">
			<input type="button" onclick=" location.href='../abm_personas/personas.php'" value="Nueva Cita" name="boton" />
		</div>
<div id="filtros" style="float: right;">
			<form action="Citas.php" method="post">
			<p> Busqueda: 
			<input type="text" size="15" placeholder="Creador, Fecha" name="busqueda">
			<input type="text" size="20" placeholder="Publico = 1, Privada = 0" name="busquedaxpubl">
			<input type="text" size="15" placeholder="Contenido" name="contenido"> 
			<input type="text" size="8" placeholder="Hora" name="hora">
			<input type="text" size="8" placeholder="Urgencia" name="tipo">
			<input type="text" size="15" placeholder="Persona" name="personas">
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
					<th><b>Dia</b></th>
					<th><b>Hora Inicio</b></th>
					<th><b>Hora Fin</b></th>
					<th><b>Prioridad</b></th>
					<th><b>Publica</b></th>
					<th><b>Cita Con</b></th>
					<th><b>Modificar</b></th>
					<th><b>Eliminar</b></th>


				</tr>

				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['nusuario'];?>
							</td>
							<td>
								<?php echo $row['contenido'];?>
							</td>
							<td>
								<?php echo $row['fecha_ini'];?>
							</td>
							<td>
								<?php echo $row['hora_ini'];?>
							</td>				
							<td>
								<?php echo $row['hora_fin'];?>
							</td>			
							<td>
								<?php echo $row['ptipo'];?>
							</td>
							<td>
								<?php echo $row['publico'];?>
							</td>
							<td>
								<?php echo $row['npersona'];?>
							</td>
							<td>
									<?php if ( $row['nusuario'] == $username ){ ?>

										 	<input type="button" onclick=" location.href='modificar_cita.php?id=<?php echo $row['id_citas'];$_SESSION['dedonde']='citas';?>' " value="Modificar" name="botonM" />									
									<?php } ?>
							</td>
							<td>
							<?php if ( $row['nusuario'] == $username ){ ?>

										 	<input type="button" onclick=" location.href='pre_eliminar_cita.php?id=<?php echo $row['id_citas'];?>' " value="Eliminar" name="botonE" />

												
									<?php } ?>
							
								
							</td>
						</tr>
					<?php } ?>
				</tbody>