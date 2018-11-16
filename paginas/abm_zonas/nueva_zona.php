<?php


$query="SELECT * FROM colores";
$resultado_color=$mysqli->query($query);

$query="SELECT * FROM zonas";
$resultado_zona=$mysqli->query($query);

 ?>
 <div  class="modal fade" id="nueva_zona"
       tabindex="-1"
       role="dialog"
       aria-labelledby="ModalLabelNew"
       aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content" id="contenedor_new">
       <div class="modal-header">

         <form class="form-horizontal" method="POST" action="">
           <h4 class="modal-title text-center ustify-content-end">

             <button type="submit" class="btn btn-success pull-left" name="nueva_zona">Crear zona</button>

             <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
           Datos de la nueva zona</h4>

       </div>
       <div class="modal-body">
         <label for="txtnombrezona_new">Nombre de Nueva zona:</label>
         <input type="text" class="form-control" name="txtnombrezona_new" id="txtnombrezona_new" value="" style="width: 95%;" required><p></p>
         <label for="txtdescrezona_new">Descripcion de Nueva zona:</label>
         <input type="text" class="form-control" name="txtdescrzona_new" id="txtdescrezona_new" value="" style="width: 95%;" required><p></p>

         <p></p>
       </div>
       </form>
     </div>
   </div>
 </div>
