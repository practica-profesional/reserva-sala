	<?php
require('../conexion.php');
	session_start();
	
	$id_usuario=$_SESSION['id_usuario'];       
	$categoria=$_SESSION['categoria'];
	$dedonde=$_SESSION['dedonde'];
$sql="SELECT * from prioridad";
$resultado = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobit .=" <option value='".$row['cod_pr']."'>".$row['tipo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";

}

$mysqli->close(); //cerramos la conexión
echo $_GET['id']."  ,  ".$dedonde ;
?>

<html>
	<head>
		<title>Crear Citas</title>
			
	</head>

	<body>
		
		<center><h1>Nueva Cita</h1></center>
				


		<form name="nueva_cita" method="POST" action="guarda_cita.php">
			<table width="50%">
				<tr>
					<td width="20"><b>Contenido</b></td>
					<td width="30"><input type="text" name="contenido" size="25" /></td>
				</tr>
				<tr>
					<td><b>Dia</b></td>
					<td><input type="date" name="fecha_ini" size="25" placeholder='aaaa/mm/dd'/></td>
					
				</tr>
				<tr>
					<td><b>Hora Inicio</b></td>
					<td><input type="time" name="hora_ini" size="5" placeholder="00:00" /></td>
				</tr>
				<tr>
					<td><b>Hora Fin</b></td>
					<td><input type="time" name="hora_fin" size="5" placeholder="00:00" /></td>
					<tr>
					<td><b>Prioridad</b></td>
					<td><select name="prioridad_cod_pr" >
       					<?php echo $combobit; ?>
   					</select> 
   					</td>

				</tr>
				<td><b>Publica (2 para no,1 para si</b></td>
					<td>
					<select name="publico" id="publico">
					<option value="1">Publica</option>
					<option value="0">Privada</option>
					</select>
					</td>
				</tr>
										
					<!--<tr><td> 

								<input type="text" name="dni" size="25" />


					</td></tr> -->

 				<input type="hidden" name="id" value= "<?php echo  $_GET['id']; ?>">	<!--	lo logre ja-->		
				

				<tr>
					<td colspan="2"><center><input type="submit" name="enviar" value="Registrar" /></center></td>
				</tr>
				<tr>
				
				<td colspan="2"><center><input type="button" <?php if ( $dedonde == 'personas' ){ ?>onclick=" location.href='../abm_personas/personas.php' " <?php }else{ ?>onclick=" location.href='Citas.php' " <?php } ?> value="Regresar" name="boton" /></center></td>
				
				</tr>


			</table>
		</form>
	</body>
	<script>
		 $(function() { $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' }); });
	</script>
</html>						
