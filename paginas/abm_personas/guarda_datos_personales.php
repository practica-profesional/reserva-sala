<?php 

require('../conexion.php');
 session_start();

$dni=$_POST['dni'];
$id_usuario=$_SESSION['id_usuario'];
$p_dp_id=$_POST['p_dp_id'];
$id_dp=$_POST['id_dp'];
$id_dp2=$_POST['id_dp2'];
$cat=$_SESSION['categoria'];

$Domicilio=$_POST['Domicilio'];
$Telefono1=$_POST['Telefono1'];
$Telefono2=$_POST['Telefono2'];
$Email=$_POST['Email'];
$Telegram=$_POST['Telegram'];

$Foto=$_POST['Foto'];
$Empresa=$_POST['Empresa'];
$Contacto=$_POST['Contacto'];
$CV=$_POST['CV'];


//echo $id_usuario .$dni .$Domicilio .$Telefono1 .$Telefono2 .$Email .$Telegram;
//echo $Foto .$Empresa .$Contacto .$CV;
echo "<br>".$id_dp." , ".$id_dp2." , ".$p_dp_id."<br>";



if($p_dp_id==''){
	echo "no hay id";

	$sql_dp="INSERT INTO datos_personales (domicilio, telefono1, telefono2, email, telegram) 
			VALUES ('$Domicilio', '$Telefono1', '$Telefono2', '$Email', '$Telegram');";

			$result_sql_dp=$mysqli->query($sql_dp);

			echo "<br>".$sql_dp;
			if($result_sql_dp>0){ 
				echo "Persona Guardada";
				}else{
				echo "Error al Guardar Persona";
			} 	
			$id_dp_nuevo=$mysqli->insert_id;

	$sql_dp2="INSERT INTO datos_personales_2 (foto, empresa, contacto, cv) 
			VALUES ('$Foto', '$Empresa', '$Contacto', '$CV');";
			$result_sql_dp2=$mysqli->query($sql_dp2);
			echo "<br>".$sql_dp2;
			if($result_sql_dp2>0){ 
				echo "Persona Guardada";
				}else{
				echo "Error al Guardar Persona";
			}
			$id_dp2_nuevo=$mysqli->insert_id;

 					echo $id_dp_nuevo." - ".$id_dp2_nuevo;
$sql_final="INSERT INTO p_dp (p_dp_id, datos_personales_id_dp, usuario_id_usuario, personas_dni, datos_personales_id_dp2) 
			VALUES (NULL, $id_dp_nuevo, $id_usuario, $dni, $id_dp2_nuevo);";

$result_sql_final=$mysqli->query($sql_final);
echo "<br>".$sql_final;
			if($result_sql_final>0){ 
				echo "pdp Guardada";
				}else{
				echo "Error al Guardar pdp";
			} 	
			$id_dp_final=$mysqli->insert_id;
echo "<br>".$id_dp_final;

}else{

$sql_dp="UPDATE datos_personales SET domicilio='$Domicilio', 
									telefono1 ='$Telefono1', 
									telefono2='$Telefono2', 
									email='$Email', 
									telegram='$Telegram' 
									WHERE id_dp = $id_dp";

			$result_sql_dp=$mysqli->query($sql_dp);
			echo "<br>".$sql_dp;
			if($result_sql_dp>0){ 
				echo "Datos Personales modificados";
				}else{
				echo "Error al modificar datos personales";
			}


$sql_dp2="UPDATE datos_personales_2 SET foto='$Foto', 
									empresa ='$Empresa', 
									contacto='$Contacto', 
									cv='$CV'
									WHERE id_dp2 = $id_dp2";

			$result_sql_dp2=$mysqli->query($sql_dp2);
			echo "<br>".$sql_dp2;
			if($result_sql_dp2>0){ 
				echo "Datos Personales modificados2";
				}else{
				echo "Error al modificar datos personales2";
			}


}

?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<body>
	
		


<div class="group">
		<table class="table1" border=1 width="100%" cellspacing=0>
			
				<tbody>
					<tr>
							<td align="center">
								<input type="button" onclick=" location.href='personas.php' " value="Regresar a Personas" name="botonRp" />
							</td>
						
					</tr>
				</tbody>
</table>
</div>
</body>
</html>