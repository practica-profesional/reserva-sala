<?php
session_start();
?>
<link rel="stylesheet" href="../../bootstrap/css/311/bootstrap311.min.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php" style="font-family: 'Lobster', cursive;">Niza</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<!-- definir menus para admines y para los que no  -->
				<?php if (isset($_SESSION['usr_id'])) { if (($_SESSION['usr_cat'])<10) { ?>
					<li><a href="#">ABM Zonas</a></li>
					<li><a href="../abm_usuario/mostrar.php">ABM Usuarios</a></li>
					<li><a href="../paginas/LoginPHP/logout.php">ABM Salas</a></li>
					<li><a href="#">   </a></li>
					<li><p class="navbar-text">Logeado como <i class="btn btn-danger btn-xs" ><b><?php echo $_SESSION['usr_name']; ?></b></i></p></li>
					<li><a href="../LoginPHP/logout.php">Log Out admin</a></li>
				<?php }else{ ?>
					<li><p class="navbar-text">Logeado como <i class="btn btn-danger btn-xs" ><b><?php echo $_SESSION['usr_name']; ?></b></i></p></li>
					<li><a href="../LoginPHP/logout.php">Log Out</a></li>
				<?php }}?>

			</ul>

		</div>
	</div>
</nav>
