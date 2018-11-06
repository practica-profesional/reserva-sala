<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login en PHP</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
      .container{margin-top:100px}
    </style>
  </head>
  <body>
    <div class="container">
      <form class="form-horizontal" action="login.php" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
          </div>
        </div>
      </form>
    </div>
  </body>




<script language="javascript">
/*window.onload = function(){
	//ocultar();
	mostrar();
}*/
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
