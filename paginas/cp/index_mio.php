<?php
session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="menu3.css" />
	<link rel="stylesheet" type="text/css" href="../bootstrap/sketchy/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/style.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="nav nav-bar">
      ksadlkjasd

    </div>
    <div class="col-md-3">
      asdasdad

    </div>

  </div>
</body>



<script language="javascript">
window.onload = function(){
	//ocultar();
	mostrar();
}
</script>
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
