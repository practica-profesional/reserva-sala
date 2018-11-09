<?php
session_start();

if(!isset($_SESSION['usr_id'])) {
	header("Location: ../LoginPHP/login.php");
}

include_once("../../conexion.php");

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
			<!-- <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> -->
				<script src="../../bootstrap/js/jquery-1.10.2.js"></script>

<style type="text/css">
body {
    margin: 0px 0px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
}

</style>
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/es-es.js'></script>
		<!-- <script src='locale/es.js'></script> -->
		<script>
			$(document).ready(function() {
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

						var variableID = event.id;
						var varConfirmacion = "NoCorfirmado";
						//alert(variableID);

						txtvarID99 = document.getElementById( "varID99" );
						    txtvarID99.value = variableID;

						return false;

					},

					selectable: true,
					selectHelper: true,
					select: function(start, end){
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');
					},
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
			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}

				caracteres = '0123456789';
				separacion1 = '/';
				separacion2 = ' ';
				separacion3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacion1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacion1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacion2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacion3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacion3;
				}else{
					event.returnValue = false;
				}
			}
		</script>
		<script type="text/javascript">
		function Confirmation() {

			if (confirm('Esta seguro de eliminar el registro?')==true) {
			    //alert('El registro ha sido eliminado correctamente!!!');
			    return true;
			}else{
			    //alert('Cancelo la eliminacion');
			    return false;
			}
		}
		</script>

</head>
	<body>


		<!-- meter el menu header.php -->

			<?php
			require_once('../LoginPHP/header.php');
			?>

			<!-- aqui termina el menu header.php -->

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h2>Reserva de Salas</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
<div class="panel-body">
<!--Inicio elementos contenedor-->






			<!-- <div class="page-header">
				<h1>Agenda</h1>
			</div> -->
			<?php
			if(isset($_SESSION['mensaje'])){
				echo $_SESSION['mensaje'];
				unset($_SESSION['mensaje']);
			}
			?>

			<div id='calendar'></div>
		</div>

		<div  class="modal fade" id="visualizar"
					tabindex="-1"
					role="dialog"
					aria-labelledby="exampleModalLabel"
					aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" id="contenedor">
					<div class="modal-header">

						<form class="form-horizontal" method="POST" action="eliminar_evento.php">
							<h4 class="modal-title text-center ustify-content-end">
								<input type="hidden" id="varID99" name="varID99" value=""/>
								<button type="submit" class="btn btn-danger pull-left" name="eliminar_evento" onclick="return Confirmation()">Eliminar</button>
								<button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							Datos del Evento</h4>
						</form>


						<!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
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

		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				 data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-center">Registrar Evento</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="POST" action="proceso.php">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="titulo" placeholder="Titulo do Evento">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Selecione</option>
										<option style="color:#FFD700;" value="#FFD700">Ventas(Amarillo)</option>
										<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
										<option style="color:#FF4500;" value="#FF4500">Naranja</option>
										<option style="color:#8B4513;" value="#8B4513">Marron</option>
										<option style="color:#1C1C1C;" value="#1C1C1C">Negro</option>
										<option style="color:#436EEE;" value="#436EEE">Azul Real</option>
										<option style="color:#A020F0;" value="#A020F0">Purpura</option>
										<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
										<option style="color:#228B22;" value="#228B22">Verde</option>
										<option style="color:#8B0000;" value="#8B0000">Rojo</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Fecha Inicial</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="inicio" id="start" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Fecha Final</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fin" id="end" onKeyPress="DataHora(event, this)">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Registrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>





<!--Fin elementos contenedor-->
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
