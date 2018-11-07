<?php
require('../conexion.php');
	
 
$sql="SELECT * from category";
$resultado = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['codigo']."'>".$row['nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}
$mysqli->close(); //cerramos la conexión
?>

<html>
	<head>
		<title>Usuarios</title>
	</head>
	<body>
		
		<center><h1>Nuevo Usuario</h1></center>
		
		<form name="nuevo_usuario" method="POST" action="guarda_usuario.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Nombre</b></td>
					<td width="30"><input type="text" name="usuario" size="25" /></td>
				</tr>
				<tr>
					<td><b>Password</b></td>
					<td><input type="password" name="password" size="25" /></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><input type="email" name="email" size="25" /></td>
				</tr>
				<tr>
					<td><b>Categoria</b></td>
					<!--<td><input type="text" name="categoria" size="5" /></td>-->
					<td><select name="categoria" >
       					<?php echo $combobit; ?>
   					</select></td>
				</tr>
				<tr>
					<td colspan="2"><center><input type="submit" name="eviar" value="Registrar" /></center></td>
				</tr>
				<tr>
				<td colspan="2"><center><input type="button" onclick=" location.href='mostrar.php' " value="Regresar" name="boton" /></center></td>
				</tr>


			</table>
		</form>
	</body>
</html>						
