<?php
require('../conexion.php');
 session_start();	
 
$deshab=0;
$dni=$_GET['dni'];
//echo $dni;
		if($dni<>'' && isset($dni) ){

				$query="select * from personas where dni = $dni";

				//echo $query;
				$resultado2 = $mysqli->query($query);
				$row1=$resultado2->fetch_assoc();


					if($resultado2->num_rows > 0){
						$tipodni=$row1['tipo_dni_codigo'];

						$deshab=1;
					
						echo $query ." - hay resultados";
						
					}else{
	
						$inicial=0;
						echo $query ." - La persona no existe, ingrese sus datos";
					}
				}else{
					$inicial=1;
					}


$sql="SELECT * from tipo_dni";
$resultado = $mysqli->query($sql); //usamos la conexion para dar un resultado a la variable


 
		if ($resultado->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
		{
		    $combobit="";
		    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
		    {
		        if(isset($tipodni) && $row['codigo']==$tipodni){
		        $combobit .=" <option value='".$row['codigo']."'selected>".$row['descripcion']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
		    	}else{
		    	$combobit .=" <option value='".$row['codigo']."'>".$row['descripcion']."</option>";	
		    	}
		    }
		}
		else
		{
		    echo "No hubo resultados";
		}


//echo $deshab." , ".$inicial;
//echo $resultado2->num_rows . $row1['nombre'];
$mysqli->close(); //cerramos la conexión
?>

<html>
	<head>
		<title>Usuarios</title>
		
	</head>
	<body onload="botones()">
		
		<center><h1>Nueva Persona</h1></center>
		
		<form name="nuevo_per" method="POST" action="guarda_Personas.php">
			<table width="50%">
				<tr>
					<td width="20"><b>DNI</b></td>
					
					<td width="80">

					<?php if ( $deshab == 0 && $inicial == 1){ ?>
						<input type="text" id="dni" name="dni1" size="25" value="<?php echo  $dni; ?>" />

						<input type="button" onclick=" location.href='nuevo_per.php?dni='+ dni.value " value="verifica persona" name="botonP" />
						<input type="submit" id="botonAP" value="Alta Persona" name="botonAP" disabled/>

					<?php }elseif($deshab == 0 && $inicial == 0){ ?>
						<input type="text" id="dni" name="dni1" size="25" value="<?php echo  $dni; ?>" disabled/>
						<input type="button" onclick=" location.href='nuevo_per.php?dni='+ dni.value " value="verifica persona" name="botonP" disabled />
						<input type="hidden" name="dniprueba" value="<?php echo  $dni; ?>">
						<input type="submit" id="botonAP" value="Alta Persona" name="botonAP" />

					<?php }else{ ?>
						<input type="text" id="dni" name="dni1" size="25" value="<?php echo  $dni; ?>" />
						<input type="button" onclick=" location.href='nuevo_per.php?dni='+ dni.value " value="verifica persona" name="botonP" disabled/>
						<!--<input type="button" onclick="botones();"" value="verifica persona" name="botonP" />-->
						<input type="submit" id="botonAP" value="Alta Persona" name="botonAP" />	

					<?php } ?>
					</td>
				</tr>
				<tr>
					<td><b>Nombre</b></td>
					<td><input type="text" id="nombre" name="nombre" size="25" required value="<?php echo  $row1['nombre']; ?>"  /></td>
				</tr>
				<tr>
					<td><b>Apellido</b></td>
					<td><input type="text" id="apellido" name="apellido" size="25" required value="<?php echo  $row1['apellido']; ?>" /></td>
				</tr>
				<td><b>Tipo dni</b></td>
					<td><select name="codigo" id="codigo" value="<?php echo  $row1['tipo_dni_codigo']; ?>" >
       					<?php echo $combobit; ?>
   					</select> 

   						<?php echo $id_usuario.$categoria; ?>
   						
   					</td>
				
				<tr height="20">
					<?php if ( $deshab == true ){ ?>
					<td colspan="2"><center><input type="button" id="registrar"  value="Registrar o Modificar Datos Personales" onclick="location.href='p_dp.php?dni=<?php echo  $dni; ?>'" /></center></td>
					<?php } ?>
				</tr>
				<tr height="20" ></tr>
				<tr>
				<td colspan="2"><center><input type="button" id="boton" onclick=" location.href='personas.php' " value="Regresar a Personas" name="boton" /></center></td>
				</tr>
				<tr height="20"></tr>
				<tr>
				<td colspan="2"><center><input type="button" id="botonR" onclick=" location.href='nuevo_per.php' " value="Recargar la Pagina" name="botonR" /></center></td>
				</tr>
				
			</table>
		</form>
	</body>
<script language="JavaScript">
		var deshab=<?php echo $deshab ?>;

		if (deshab==1){
		document.getElementById('dni').disabled=deshab; 
		document.getElementById('nombre').disabled=deshab;
		document.getElementById('apellido').disabled=deshab;
		document.getElementById('botonAP').disabled=deshab;
		document.getElementById('codigo').disabled=deshab;
		//alert("hola");
			}

			
		</script>


</html>						
