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

</head>
<body>



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
<div class="panel-footer">
  <div class="container">

  </div>
</div>

</body>
</html>
