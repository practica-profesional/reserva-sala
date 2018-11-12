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


            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth()+1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if(dia<10)
              dia='0'+dia; //agrega cero si el menor de 10
            if(mes<10)
              mes='0'+mes //agrega cero si el menor de 10
            document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;


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
            var fechaActual = document.getElementById("fechaActual").value;
            llenar_modal();

            var msg='la sala solicitada es: ' + salas;
            msg=msg + ' \nPara el día:   ' + fechaActual;
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

        <form class="form-inline" method="POST" action="pedido_evento_prueba.php">


        <div class="form-group">
            <label for="salas">Salas por Zonas:</label>
            <select class="form-control" id="salas" name="salas" style="width: 95%;">
              <?php
                while($registros_salas = mysqli_fetch_array($resultado_salas)){

                  echo '<option style="color:'.$registros_salas[color].'">'.$registros_salas[nombre_sala].'</option>';
                }
              ?>
            </select>
        </div>
<p></p>
        <div class="form-group">
          <div class="input-xs">
            <label for="txtQuien">Quien solicita la sala:</label>
            <input type="email" class="form-control" id="txtQuien" name="txtQuien" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            aria-describedby="emailHelp" placeholder="Ingrese su email" size="60" style="width: 95%;">
          </div>
        </div>

        <p></p>

        <div class="form-group mx-sm-3 mb-2">
              <label for="cantpers">Cuántas personas?:</label>
              <select class="form-control" id="cantpers" name="cantpers" aria-describedby="cantpers" style="width: 95%;">
                <option>1 -5</option>
                <option>5 - 20</option>
                <option>mas de 20</option>
              </select>
        </div>
<p></p>
        <div class="form-group">
            <label for="fechaActual">Seleccione un día:</label>
             <input class="form-control" type="date" id="fechaActual" name="fechaActual" style="width: 95%;"
             step="1" min="" max="2030-12-31" value="">

        </div>
        <p></p>
        <div class="form-group ">
              <label for="horaInicio">Hora de inicio:   </label>
              <select class="form-control mb-2" id="horaInicio" name="horaInicio" >
                <?php
                  for($i = 8 ;$i < 17; $i++){

                    echo '<option>'.$i.":00".'</option>';
                    echo '<option>'.$i.":30".'</option>';
                  }
                ?>
                <option>17:00</option>
              </select>
        </div>
<br><br>
        <div class="form-group">
              <label for="horaFin">Hora de fin:     </label>
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

<br>

        <div class="form-group">
              <label for="tipouso">Tipo de uso:</label>
              <select class="form-control" id="tipouso" name="tipouso" style="width: 95%;">
                <option>Videoconferencia</option>
                <option>Reuniones</option>
                <option>Capacitaciones</option>
                <option>Otros</option>
              </select>
        </div>
         <br>


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
