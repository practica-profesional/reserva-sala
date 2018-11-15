<div  class="modal fade" id="eliminar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="contenedor">
      <div class="modal-header">

        <form class="form-horizontal" method="POST" action="">
          <h4 class="modal-title text-center ustify-content-end">
            <input type="hidden"  name="idzona" id="idzona" value="">
            <button type="submit" class="btn btn-danger pull-left" name="eliminar_zona"
            onclick="return Confirmation()">Eliminar</button>
            <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          Datos de la zona</h4>
        </form>


        <!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
      </div>
      <div class="modal-body">
        <p>La  a eliminar es:</p>
        <br>
        <input type="text" class="form-control" disabled name="txtnombrezona" id="txtnombrezona" value=""><br>

      </div>
    </div>
  </div>
</div>
