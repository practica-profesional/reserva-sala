<?php

//echo "<script>alert('nueva sala jaja');</script>";

//header('Location: mostrar_sala.php');

$query="SELECT * FROM colores";
$resultado_color=$mysqli->query($query);

$query="SELECT * FROM zonas";
$resultado_zona=$mysqli->query($query);

 ?>
 <div  class="modal fade" id="nueva_sala"
       tabindex="-1"
       role="dialog"
       aria-labelledby="ModalLabelNew"
       aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content" id="contenedor_new">
       <div class="modal-header">

         <form class="form-horizontal" method="POST" action="">
           <h4 class="modal-title text-center ustify-content-end">

             <button type="submit" class="btn btn-success pull-left" name="nueva_sala">Crear sala</button>

             <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
           Datos de la nueva sala</h4>

       </div>
       <div class="modal-body">
         <label for="nombre_sala">Nombre de Nueva Sala:</label>
         <input type="text"  name="txtnombresala_new" id="txtnombresala_new" value="" style="width: 95%;" required><p></p>

         <select class="form-control" id="color_sala" name="color_sala" style="width: 80%;">
           <?php
             while($registros_color = mysqli_fetch_array($resultado_color)){

               echo '<option style="color:'.$registros_color[codigo_color].'">'.$registros_color[nombre_color].'</option>';
             }
           ?>
         </select><p></p>
         <label for="cant">Cantidad de personas:</label>
         <input type="text"  name="txtcantesala_new" id="txtcantesala_new" value="" required pattern="[0-9]{2}" placeholder="Formato de dos digitos"><p></p>
         <label for="ini">Hora de inicio:</label>
         <input type="time" id="txtinisala_new" name="txtinisala_new" min="08:00" max="18:00" required value="08:00">
         <label for="fin">Hora de fin:</label>
         <input type="time" id="txtfinsala_new" name="txtfinsala_new" min="08:00" max="18:00" required value="18:00"><p></p>
         <label for="fin">Zona a la que pertenece:</label>
         <select class="form-control" id="zona_sala" name="zona_sala" style="width: 80%;">
           <?php
             while($registros_zona = mysqli_fetch_array($resultado_zona)){

               echo '<option value='.$registros_zona[id_zona].'>'.$registros_zona[nombre_zona].'</option>';
             }
           ?>
         </select><p></p>
       </div>
       </form>
     </div>
   </div>
 </div>
