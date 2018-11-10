<?php
session_start();
//include_once("db.php");
include_once("../../conexion.php");
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

        });


        function confirmar_reserva(){
          var txtQuien = document.getElementById("txtQuien").value;
          if(txtQuien==""){
            alert('Por favor complete el email');
            document.getElementById("txtQuien").focus();
            return false;
          }else{

            var txtQuien = document.getElementById("txtQuien").value;
            var salas = document.getElementById("salas").value;
            var cantpers = document.getElementById("cantpers").value;
            var horaInicio = document.getElementById("horaInicio").value;
            var horaFin = document.getElementById("horaFin").value;
            var tipouso = document.getElementById("tipouso").value;
            llenar_modal();

            var msg='la sala solicitada es: ' + salas;
            msg=msg + ' \nPara:   ' + cantpers + '   personas';
            msg=msg + ' \nHora de inicio:   ' + horaInicio + '    y   Hora de finalización:   ' + horaFin;
            msg=msg + ' \nPara ser usada para:   ' + tipouso;
            msg=msg + ' \n\nLa solicita:   ' + txtQuien + ' \nEsta seguro de enviar esta información?';
              if (confirm(msg)==true) {
                  //alert('El registro ha sido eliminado correctamente!!!');
                  return true;
              }else{
                  //alert('Cancelo la eliminacion');
                  return false;
              }
          }
        };



        function llenar_modal(){

          document.getElementById("text-dropdownMenuSalas").value=document.getElementById("salas").value;
          document.getElementById("txtQuienEnviar").value = document.getElementById("txtQuien").value;
          document.getElementById("text-cantpers").value = document.getElementById("cantpers").value;
          document.getElementById("text-horaInicio").value = document.getElementById("horaInicio").value;
          document.getElementById("text-horaFin").value = document.getElementById("horaFin").value;
          document.getElementById("text-tipouso").value = document.getElementById("tipouso").value;

        };



    </script>


<div class="panel-group panel-border">
  <div class="panel panel-success">
    <div class="panel-heading"><h5>Realizar una Reserva</h5></div>
      <div class="panel-body">

        <form class="form-horizontal" method="POST" action="pedido_evento_prueba.php">


        <div class="form-group">
            <label for="sel1">Salas por Zonas:</label>
            <select class="form-control" id="salas" name="salas">
              <?php
                while($registros_salas = mysqli_fetch_array($resultado_salas)){

                  echo '<option>'.$registros_salas[nombre_sala].'</option>';
                }
              ?>
            </select>
        </div>


        <div class="text">
          <label for="quien">Quien solicita la sala:</label>
          <input type="email" class="form-control" id="txtQuien" name="txtQuien" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
          aria-describedby="emailHelp" placeholder="Ingrese su email" size="60">
        </div>

        <p></p>

        <div class="form-group">
              <label for="cantpers">Cuántas personas?:</label>
              <select class="form-control" id="cantpers" name="cantpers" aria-describedby="cantpers">
                <option>1 -5</option>
                <option>5 - 20</option>
                <option>mas de 20</option>
              </select>
        </div>


        <div class="form-group">
              <label for="sel1">Hora de inicio:</label>
              <select class="form-control" id="horaInicio" name="horaInicio">
                <?php
                  for($i = 8 ;$i < 17; $i++){

                    echo '<option>'.$i.":00".'</option>';
                    echo '<option>'.$i.":30".'</option>';
                  }
                ?>
                <option>17:00</option>
              </select>
        </div>

        <div class="form-group">
              <label for="sel1">Hora de fin:</label>
              <select class="form-control" id="horaFin" name="horaFin">
                <?php
                  for($i = 8 ;$i < 18; $i++){

                    echo '<option>'.$i.":00".'</option>';
                    echo '<option>'.$i.":30".'</option>';
                  }
                ?>
                <option selected="selected">18:00</option>
              </select>
        </div>



        <div class="form-group">
              <label for="sel1">Tipo de uso:</label>
              <select class="form-control" id="tipouso" name="tipouso">
                <option>Videoconferencia</option>
                <option>Reuniones</option>
                <option>Capacitaciones</option>
                <option>Otros</option>
              </select>
        </div>


        <p></p>

<!-- botones de envio pruebas varias -->
        <!-- <button class="btn btn-default btn-success" type="button" name="button"
        data-toggle="modal" data-target="#reservaModal" onclick="llenar_modal()">Enviar reserva</button> -->

        <button class="btn btn-default btn-success" type="submit" name="button"
                onclick="return confirmar_reserva()">Enviar reserva</button>

        <div class="modal fade" id="reservaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button class="btn btn-default btn-success" type="submit" name="button"
                        onclick="return confirmar_reserva()">Enviar reserva</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Datos a enviar para reserva de sala</h4>
              </div>
              <div class="modal-body">
                Se enviarán la siguiente información:
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

      </div>
    </div>

  </div>
</div>
