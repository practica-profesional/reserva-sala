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
            <input type="hidden"  name="idsala_mod" id="idsala_mod" value="">
            <button type="submit" class="btn btn-success pull-left" name="modificar_sala"
            onclick="return Confirmation()">Modificar</button>
            <button type="button" class="btn close panelTitleTxt" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          Datos de la sala</h4>

      </div>
      <div class="modal-body">
        <input type="text"  name="txtnombresala_mod" id="txtnombresala_mod" value=""><br>
        <input type="text"  name="txtnombresala_mod" id="txtnombresala_mod" value=""><br>
        <input type="text"  name="txtnombresala_mod" id="txtnombresala_mod" value="">
      </div>
      </form>
    </div>
  </div>
</div>
