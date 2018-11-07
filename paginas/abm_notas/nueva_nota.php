<?php
require('../conexion.php');
	session_start();
	$id_usuario=$_SESSION['id_usuario'];       

?>

<html>
	<head>
		<title>Crear Nota</title>
	</head>
	<body>
		
		<center><h1>Nueva Nota</h1></center>
		
		<form name="nueva.nota" method="POST" action="guarda_notas.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Contenido</b></td>
					<td width="30"><input type="text" name="contenido" size="25" required /></td>
				</tr>
				<tr>
					<td><b>Fecha</b></td>
					<td><input type="date" name="fecha"></td>
				</tr>
				<tr>


				
					
				
				<tr>
					<td colspan="2"><center><input type="submit" name="enviar" value="grabar nota" /></center></td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="button" onclick=" location.href='notas.php' " value="Regresar" name="boton" /></center></td>
				</tr>


			</table>
		</form>
	</body>
</html>						
