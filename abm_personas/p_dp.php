<?php
	
	require('../conexion.php');
    session_start();
    $cat=$_SESSION['categoria'];
    $dni=$_GET['dni'];
    $sql1="select * from personas where dni = $dni";
    $resultado1=$mysqli->query($sql1);
    




	//$query="SELECT p_dp_id, p.nombre as nusuario, apellido, dni, telefono1, dp.email as pemail FROM p_dp pd, personas p, datos_personales dp, usuario u WHERE pd.usuario_id_usuario= u.id_usuario and pd.personas_dni=p.dni and pd.datos_personales_id_dp=dp.id_dp and u.category_codigo= $cat and p.nombre like '%$nomape%' and dni like '%$dni%'" ;


	$query="SELECT p_dp_id, dp.id_dp, dp2.id_dp2, domicilio, telefono1, telefono2, telegram, dp.email as pemail , dp2.foto, dp2.empresa, dp2.contacto, dp2.cv FROM p_dp pd, personas p, datos_personales dp, datos_personales_2 dp2, usuario u WHERE pd.usuario_id_usuario = u.id_usuario AND pd.personas_dni = p.dni AND pd.datos_personales_id_dp = dp.id_dp AND pd.datos_personales_id_dp2 = dp2.id_dp2 AND u.category_codigo = $cat AND pd.personas_dni = $dni";

	$resultado2=$mysqli->query($query);
	$row2=$resultado2->fetch_assoc();

	$id_dp=$row2['id_dp'];
	$id_dp2=$row2['id_dp2'];

	echo $query;
	?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personas</title>
	<link rel="stylesheet" type="text/css" href="../tablas.css" media="screen">
</head>

<body>
	
		<center><h1>Datos de Personas</h1></center>


		<div style="float: left;">
			<input type="button" onclick=" location.href='personas.php'" value="Regresar" name="boton" />
				</div>
	<div id="filtros" style="float: right;">
		<form action="guarda_datos_personales.php" method="post">
			<input type="hidden" name="dni" value="<?php echo $dni; ?>">
			<input type="hidden" name="id_dp" value="<?php echo $row2['id_dp']; ?>">
			<input type="hidden" name="id_dp2" value="<?php echo $row2['id_dp2']; ?>">
			<input type="hidden" name="p_dp_id" value="<?php echo $row2['p_dp_id']; ?>">

			<button type="submit">Registrar Datos Personales</button></p>
			
	</div>	

	<br><br>

<div class="group">
		<table class="table2" border=1 width="100%" cellspacing=0>
			<thead>
				<tr>
					<th><b>Nombre</b></th>
					<th><b>Apellido</b></th>
					<th><b>DNI</b></th>
				</tr>
			</thead>
				<tbody>
					<?php while($row=$resultado1->fetch_assoc()){ ?>

						<tr>
							<td><?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['apellido'];?>
							</td>
							<td>
								<?php echo $row['dni'];?>
							</td>

						</tr>
					<?php } ?>
				</tbody>
		</table>

		<br><br>
		
		<table class="tabla_datos" border=0 width="90%" cellspacing=2>
			<tr>
				<td width="20%">Domicilio <?php echo $row2['p_dp_id'];?> <?php echo $row2['id_dp'];?> <?php echo $row2['id_dp2'];?></td>
				<td width="30%" ><input type="text" name="Domicilio" value='<?php echo $row2['domicilio'];?>'></td>
				<td width="20%">Foto</td>
				<td><input type="text" name="Foto"value='<?php echo $row2['foto'];?>'></td>
			</tr>
			<tr>
				<td>Telefono1</td>
				<td><input type="text" name="Telefono1" value='<?php echo $row2['telefono1'];?>'></td>
				<td>Empresa</td>
				<td><input type="text" name="Empresa" value='<?php echo $row2['empresa'];?>'></td>
			</tr>
			<tr>
				<td>Telefono2</td>
				<td><input type="text" name="Telefono2" value='<?php echo $row2['telefono2'];?>'></td>
				<td>Contacto</td>
				<td><input type="text" name="Contacto" value='<?php echo $row2['contacto'];?>'></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="Email" value='<?php echo $row2['pemail'];?>'></td>
				<td>CV</td>
				<td><input type="text" name="CV" value='<?php echo $row2['cv'];?>'></td>
			</tr>
			<tr>
				<td>Telegram</td>
				<td><input type="text" name="Telegram" value='<?php echo $row2['telegram'];?>'></td>
			</tr>
		</table>

		
		</div>
	</form>
	
	</body>
</html>