<div  class="modal fade" id="eliminar"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="contenedor">
      <div class="modal-header">

        <form class="form-horizontal" method="POST" action=""> <!--eliminar_sala.php-->
          <h4 class="modal-title text-center ustify-content-end">
            <input type="hidden"  name="idsala" id="idsala" value="">
            <button type="submit" class="btn btn-danger pull-left" name="eliminar_sala"
            onclick="return Confirmation()">Eliminar</button>
            <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          Datos de la sala</h4>
        </form>


        <!-- <h4 class="modal-title text-center">Datos del Evento</h4> -->
      </div>
      <div class="modal-body">
        <p>La sala a eliminar es:</p>
        <br>
        <input type="text" class="form-control" disabled name="txtnombresala" id="txtnombresala" value=""><br>

      </div>
    </div>
  </div>
</div>
