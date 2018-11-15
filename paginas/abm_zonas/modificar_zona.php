<?php

?>


<div  class="modal fade" id="modificar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="contenedor_mod">
      <div class="modal-header">

        <form class="form-horizontal" method="POST" action="">
          <h4 class="modal-title text-center ustify-content-end">
            <input type="hidden"  name="idzona_mod" id="idzona_mod" value="">
            <button type="submit" class="btn btn-success pull-left" name="modificar_zona"
            onclick="return ConfirmationMod()">Modificar</button>
            <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          Datos de la zona</h4>

      </div>
      <div class="modal-body" class="form-inline">
        <input type="text"  class="form-control" name="txtnombrezona_mod" id="txtnombrezona_mod" value=""  required><br>
        <label for="txtinizona_mod" class="col-md-4">Hora de inicio: </label>
        <input type="time" class="form-control" style="width: 50%;" id="txtinizona_mod" name="txtinizona_mod" min="08:00" max="18:00" required ><br>
        <label for="txtinizona_mod" class="col-md-4">Hora de fin: </label>
        <input type="time" class="form-control" style="width: 50%;" id="txtfinzona_mod" name="txtfinzona_mod" min="08:00" max="18:00" required >
      </div>
      </form>
    </div>
  </div>
</div>
