<?php 
session_start(); 
?> 

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="menu3.css" />
	<link rel="stylesheet" href="fonts/style.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>

<body onload="ocultar()">
		<header>
		<nav>
			<ul>
				<li onclick="mostrar()"><a href="inicio.php" target="contenido"><span class="inicio"><i class="icon icon-home"></i></span>Inicio</a></li>
				<li id="users"><a href="../abm_usuario/mostrar.php" target="contenido"><span class="usuarios"><i class="icon icon-key"></i></span>ABM Usuarios</a>
				</li>
				<li id="Personas"><a href="../abm_personas/personas.php" target="contenido"><span class="personas"><i class="icon icon-pacman"></i></span>ABM Personas</a></li>
				<li id="Citas"><a href="#"><span class="citas"><i class="icon icon-pencil"></i></span>ABM Citas y Notas</a>
					<ul>
						<li><a href="../abm_citas/Citas.php" target="contenido">Citas</a></li>
						<li><a href="../abm_notas/notas.php" target="contenido">Notas</a></li>
					</ul>

				</li>
				<li onclick="BotonSalir()"><a id="Salir" href="#" ><span class="salir"><i class="icon icon-rocket"></i></span>Logout</a></li>
			</ul>
		</nav>
	</header>
<!--<div>

<?php
	//echo "Esta pagina es para " .$_SESSION['username'];
?>
</div>-->

	<div id="global">
		<iframe name="contenido" id="external" style="width:100%;height:100%;border: 0;margin: auto;padding: 0px auto;" src="inicio.php"></iframe>
	</div>


</body>


<script language="javascript"> 
window.onload = function(){
	//ocultar();
	mostrar();
} 
</script> 
<script type="text/javascript">
//$("#users").hide("slow");
//document.getElementById('users').style.display = 'none';
//document.getElementById('Salir').style.display = 'none';
//document.getElementById('Personas').style.display = 'none';
//document.getElementById('Citas').style.display = 'none';
</script>
<!--<script type="text/javascript">

 $(document).ready(function(){ 
   $("#Salir").on("click",function(){
      $("#users").toggle("slow","linear");
   });
});
</script>-->

<script type="text/javascript">
function mostrar(){
	var silogin=false;
	
		var username='<?php echo $_SESSION['username']; ?>';
		var categoria='<?php echo $_SESSION['categoria']; ?>';
		var silogin='<?php echo $_SESSION['loggedin']; ?>';
		if (silogin == true) {
		if(categoria >10){
		document.getElementById('users').style.display = 'none';
		}
		//document.getElementById('Salir').style.display = 'block';
		//document.getElementById('Personas').style.display = 'block';
		//document.getElementById('Citas').style.display = 'block';

		}else{
			window.location.href = "../login/logout.php";
			ocultar();
		}
	}

function ocultar(){
document.getElementById('users').style.display = 'none';
//document.getElementById('Salir').style.display = 'none';
document.getElementById('Personas').style.display = 'none';
document.getElementById('Citas').style.display = 'none';

}
function BotonSalir(){
	//ocultar();
	window.location.href = "../login/logout.php";
}
</script>
</html>
