<?php

if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
  $nom=$_POST['busqueda'];

    $query="SELECT id_zona, nombre_zona, descripcion
    FROM zonas where nombre_zona like '$nom%'";
//echo $query;
}
else{
  $query="SELECT id_zona, nombre_zona, descripcion
  FROM zonas";
}
//echo $query;
$resultado_lista=$mysqli->query($query);


 ?>

<div class="container">
<center><h1>Z o n a s</h1></center>
<!-- </div>
<div id="filtros" style="float: right;"> -->
  <form class="form form-inline" role="form" action="" method="post">
    <div class="form-group col-md-3">
        <!--<button type="submit" class="btn btn-primary"
            onclick=" location.href='' "
            value="Nueva sala" name="nueva_sala" /></button>-->
            <button type="button" class="btn btn-primary"
            data-toggle="modal" data-target="#nueva_zona">
              Nueva sala
            </button>
    </div>
    <div class="form-group form-group-justified col-md-9">
        <p> Busqueda por nombre de zona:
        <input type="text" name="busqueda">
        <button type="submit" class="btn btn-primary" name="busqueda_zona">Filtrar</button></p>
    </div>
  </form>
</div>
<br>

<div class="container">

  <div class="table-hover table-responsive">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col"><b>Nombre</b></th>
          <th scope="col"><b>Descripción</b></th>
          <th scope="col"><b></b></th>
          <th scope="col"><b></b></th>
        </tr>
      </thead>
        <tbody>
          <?php while($row=$resultado_lista->fetch_assoc()){ ?>
            <tr>
              <td>
                <?php echo $row['nombre_zona'];?>
              </td>
              <td>
                <?php echo $row['descripcion'];?>
              </td>
              <td>
                  <button type="button" class="btn btn-secondary"
                  data-toggle="modal" data-target="#modificar"
                  onclick="return llenarSala(<?php echo $row['id_zona'];?>,'<?php echo $row['nombre_zona'];?>', '<?php echo $row['descripcion'];?>')">
                    Modificar
                  </button>
              </td>
              <td>
                  <button type="button" class="btn btn-secondary"
                  data-toggle="modal" data-target="#eliminar"
                  onclick="return llenarSala(<?php echo $row['id_zona'];?>,'<?php echo $row['nombre_zona'];?>')">
                    Eliminar
                  </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </div>
</div>
