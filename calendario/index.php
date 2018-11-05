<?php
session_start();
include_once("db.php");
$consulta_eventos = "SELECT id, titulo, color, inicio, fin FROM mis_eventos";
$resultado_eventos = mysqli_query($conexion, $consulta_eventos);
?>
<!DOCTYPE html>
<html lang="es-es">
	<head>
		<meta charset='utf-8' />
		<title>Reserva de Salas</title>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/personalizado.css' rel='stylesheet' />
<style type="text/css">
body {
    margin: 0px 0px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
}
</style>
<style type="text/css">
	li.dropdown-submenu:hover ul{
	display: block;
	left: 100%;
	}
	.dropdown-submenu{
		position:relative;
	}

	.dropdown-submenu:hover .dropdown-menu{
		top:0;
	}
</style>
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/es-es.js'></script>
		<!-- <script src='locale/es.js'></script> -->
		<script>
		var validations ={
    email: [/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/, 'Please enter a valid email address']
		};
			$(document).ready(function() {
				$("#txtQuien").keyup(function () {
		        var value = $(this).val();
		        $("#txtQuienEnviar").val(value);
    		});
				$("input[type=email]").change( function(){
		        // Set the regular expression to validate the email
		        validation = new RegExp(validations['email'][0]);
		        // validate the email value against the regular expression
		        if (!validation.test(this.value)){
		            // If the validation fails then we show the custom error message
		            this.setCustomValidity(validations['email'][1]);
		            return false;
		        } else {
		            // This is really important. If the validation is successful you need to reset the custom error message
		            this.setCustomValidity('');
		        }
		    });
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					firstDay: 1,

					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {

						$('#visualizar #id').text(event.id);
						$('#visualizar #title').text(event.title);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar').modal('show');


						return false;

					},

					selectable: false,
					selectHelper: true,

					events: [
						<?php
							while($registros_eventos = mysqli_fetch_array($resultado_eventos)){
								?>
								{
								id: '<?php echo $registros_eventos['id']; ?>',
								title: '<?php echo $registros_eventos['titulo']; ?>',
								start: '<?php echo $registros_eventos['inicio']; ?>',
								end: '<?php echo $registros_eventos['fin']; ?>',
								color: '<?php echo $registros_eventos['color']; ?>',
								},<?php
							}
						?>
					]
				});
			});
		</script>
		<script>
		$(function(){
		    $(".dropdown-menu li a").click(function(){
		        var item = $(this);
		        var id = item.parent().parent().attr("aria-labelledby");
							//alert(id);


		        $("#"+id+":first-child").text($(this).text());
		        $("#"+id+":first-child").val($(this).text());
						document.getElementById("text-" + id).value = $(this).text();
		   });
		});
		</script>

</head>
<body>



<div class="container">

	<?php
	if(isset($_SESSION['mensaje'])){
		echo $_SESSION['mensaje'];
		unset($_SESSION['mensaje']);
	}
	?>

	<div class="col-md-3 ">
		<h3>Reservar</h3>

		<div class="panel-group panel-border">
		  <div class="panel panel-success">
				<div class="panel-heading">Elija Sala</div>
		    <div class="panel-body">

<p></p>

<!--<div class="btn-group">
    <a class="btn btn-default dropdown-toggle btn-blog " data-toggle="dropdown" href="#" id="dropdownMenu1" style="width:200px;"><span class="selection pull-left">Select an option </span>
      <span class="pull-right glyphiconglyphicon-chevron-down caret" style="float:right;margin-top:10px;"></span></a>

     <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
       <li><a href="#" class="" data-value=1><p> HER Can you write extra text or <b>HTLM</b></p> <h4> <span class="glyphicon glyphicon-plane"></span>  <span> Your Option 1</span> </h4></a>  </li>
       <li><a href="#" class="" data-value=2><p> HER Can you write extra text or <i>HTLM</i> or some long long long long long long long long long long text </p><h4> <span class="glyphicon glyphicon-briefcase"></span> <span>Your Option 2</span>  </h4></a>
      </li>
      <li class="divider"></li>
   <li><a href="#" class="" data-value=3><p> HER Can you write extra text or <b>HTLM</b> or some </p><h4> <span class="glyphicon glyphicon-heart text-danger"></span> <span>Your Option 3</span>  </h4></a>
      </li>
    </ul>
  </div>
  <input type="text" id="vl" /> -->
	<form class="form-horizontal" method="POST" action="pedido_evento.php">

					<div class="dropdown">
				    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuSalas"
						data-toggle="dropdown">Salas por Zonas
				    <span class="selection"></span><span class="caret"></span></button>
				    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuSalas">
				      <li class="dropdown-header">Zona Niza</li>
				      <li><a href="#">Sala Reuniones Niza</a></li>
				      <li><a href="#">Sala videconferencia Niza</a></li>
				      <li><a href="#">Sala 3 Niza</a></li>
				      <li class="divider"></li>
				      <li class="dropdown-header">Zona Deheza</li>
				      <li><a href="#">Sala Unica Deheza</a></li>
				    </ul>
				  </div>

					<p></p>
					<div class="text">
						<label for="quien">Quien solicita la sala, por favor ingrese su email</label>
						<input type="email" class="form-control" id="txtQuien" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
						aria-describedby="emailHelp" placeholder="Ingrese su email">
					</div>
					<p></p>



					<p></p>

					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="cantpers" data-toggle="dropdown">cuantas personas
						<span class="caret"></span></button>
						<ul class="dropdown-menu" aria-labelledby="cantpers">
							<li><a href="#">1 -5</a></li>
							<li><a href="#">5 - 20</a></li>
							<li><a href="#">mas de 20</a></li>
						</ul>
					</div>

					<p></p>
								<!--<div class="form-group">
								  <label for="sel1">Select list:</label>
								  <select class="form-control" id="sel1">
								    <option>1</option>
								    <option>2</option>
								    <option>3</option>
								    <option>4</option>
								  </select>
								</div>-->
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="horaInicio" data-toggle="dropdown">Hora de inicio
						<span class="caret"></span></button>
						<ul class="dropdown-menu" aria-labelledby="horaInicio">
							<li><a href="#">8 am</a></li>
							<li><a href="#">10 am</a></li>
							<li><a href="#">12 am</a></li>
						</ul>
					</div>

					<p></p>

					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="horaFin" data-toggle="dropdown">Hora de fin
						<span class="caret"></span></button>
						<ul class="dropdown-menu" aria-labelledby="horaFin">
							<li><a href="#">8 am</a></li>
							<li><a href="#">10 am</a></li>
							<li><a href="#">12 am</a></li>
						</ul>
					</div>

					<p></p>

					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" id="tipouso" type="button"
						 data-toggle="dropdown">Tipo de uso
						<span class="caret"></span></button>
						<ul class="dropdown-menu" aria-labelledby="tipouso">
							<li><a href="#">videconferencia</a></li>
							<li><a href="#">Meeting</a></li>
							<li><a href="#">Laboral</a></li>
						</ul>
					</div>

					<p></p>


					<p></p>

					<button class="btn btn-default btn-success" type="button" name="button"
					data-toggle="modal" data-target="#reservaModal">Enviar reserva</button>

					<div class="modal fade" id="reservaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
								aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button class="btn btn-default btn-success" type="submit" name="button">Enviar reserva</button>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">datos a enviar para reserva de sala</h4>
								</div>
								<div class="modal-body">
									Se enviarán los siguientes datos:
									<br>

									<input type="text" style="border: 0px" name="text-dropdownMenuSalas" id="text-dropdownMenuSalas" value=""><br>
									<input type="text" style="border: 0px" name="txtQuienEnviar" id="txtQuienEnviar" value="" size="50"><br>
									<input type="text" style="border: 0px" name="text-cantpers" id="text-cantpers" value=""><br>
									<input type="text" style="border: 0px" name="text-horaInicio" id="text-horaInicio" value=""><br>
									<input type="text" style="border: 0px" name="text-horaFin" id="text-horaFin" value=""><br>
									<input type="text" style="border: 0px" name="text-tipouso" id="text-tipouso" value=""><br>

								</div>
							</div>
						</div>
					</div>

</form>

				</div>
		  </div>

		</div>
	</div>

	<div class="col-md-9">
		<div class="row">
	    <div class="col-md-12 text-center">
	      <h2>Reserva de Salas</h2>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-md-12">
					<div class="panel-body">
					<!--Inicio elementos contenedor-->




								<div id='calendar'></div>
							</div>

							<div  class="modal fade" id="visualizar"
										tabindex="-1"
										role="dialog"
										aria-labelledby="exampleModalLabel"
										data-backdrop="static">
								<div class="modal-dialog" role="document">
									<div class="modal-content" id="contenedor">
										<div class="modal-header">
											<h3 class="modal-title text-center" id="exampleModalLabel">Datos del evento
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
										</h3>
										</div>
										<div class="modal-body">
											<dl class="dl-horizontal">
												<!-- <dt>ID de Evento</dt>
												<dd id="id"></dd> -->
												<dt>Titulo de Evento</dt>
												<dd id="title"></dd>
												<dt>Inicio de Evento</dt>
												<dd id="start"></dd>
												<dt>Fin de Evento</dt>
												<dd id="end"></dd>
											</dl>
										</div>
									</div>
								</div>
							</div>


					</div>
	  </div>
	</div>

</div>

<div class="panel-footer">
  <div class="container">

  </div>
</div>

</body>
</html>
