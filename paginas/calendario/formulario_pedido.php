<?php
session_start();
include_once("db.php");
$consulta_salas="SELECT * from salas";
$resultado_salas=mysqli_query($conexion, $consulta_salas);
?>
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
        });
    </script>
<form class="form-horizontal" method="POST" action="pedido_evento.php">

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuSalas"
          data-toggle="dropdown">Salas por Zonas
          <span class="selection"></span><span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuSalas">

            <?php
              while($registros_salas = mysqli_fetch_array($resultado_salas)){

                echo '<li><a href="#">'.$registros_salas[nombre].'</a></li>';
              }
            ?>

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

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="horaInicio" data-toggle="dropdown">Hora de inicio
          <span class="caret"></span></button>
          <ul class="dropdown-menu" aria-labelledby="horaInicio">

            <?php
              for($i = 8 ;$i < 17; $i++){

                echo '<li><a href="#">'.$i.":00".'</a></li>';
                echo '<li><a href="#">'.$i.":30".'</a></li>';
              }
            ?>
            <li><a href="#">17:00</a></li>
          </ul>
        </div>

        <p></p>

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="horaFin" data-toggle="dropdown">Hora de fin
          <span class="caret"></span></button>
          <ul class="dropdown-menu" aria-labelledby="horaFin">
            <?php
              for($i = 8 ;$i < 18; $i++){

                echo '<li><a href="#">'.$i.":00".'</a></li>';
                echo '<li><a href="#">'.$i.":30".'</a></li>';
              }
            ?>
            <li><a href="#">18:00</a></li>
          </ul>
        </div>

        <p></p>

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" id="tipouso" type="button"
           data-toggle="dropdown">Tipo de uso
          <span class="caret"></span></button>
          <ul class="dropdown-menu" aria-labelledby="tipouso">
            <li><a href="#">Videconferencia</a></li>
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

                <input type="text" style="border: 0px" name="text-dropdownMenuSalas" id="text-dropdownMenuSalas" value=""  size="50"><br>
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
