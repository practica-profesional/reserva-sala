<?php
include ('../login/control.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" type="text/css" href="menu3.css" /> -->
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>inicio</title>
</head>
<body>

<div class="container-fluid" >

	<img id="mostrar_img" src="imagenes/tux-graduate.png" alt="TuxGraduate" width="400" onclick="cambiar()"></img>

</div>

</body>

<script>
var i=2;

function cambiar() {

	if (i == 1){
	document.images["mostrar_img"].src="imagenes/tux-graduate.png";
	document.getElementById("mostrar_img").style.width="400px";
	i=2;
	}
	else
	{
	document.images["mostrar_img"].src="imagenes/der.png";
	document.getElementById("mostrar_img").style.width="900px";
	i=1;
	}
}



</script>
</html>
