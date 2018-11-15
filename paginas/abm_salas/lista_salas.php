<?php

if(isset($_POST['busqueda']) && $_POST['busqueda']<>''){
  $nom=$_POST['busqueda'];

    $query="SELECT id_sala, nombre_sala, cant_max_pers, hora_inicio, hora_fin,
    salas.id_zona as id_z, creacion, color, nombre
    FROM salas INNER JOIN zonas ON salas.id_zona=zonas.id_zona where nombre_sala like '$nom%'";
//echo $query;
}
else{
  $query="SELECT id_sala, nombre_sala, cant_max_pers, hora_inicio, hora_fin,
  salas.id_zona as id_z, creacion, color, nombre
  FROM salas INNER JOIN zonas ON salas.id_zona=zonas.id_zona";
}
//echo $query;
$resultado=$mysqli->query($query);



 ?>

<div class="container">
<center><h1>S a l a s</h1></center>
<!-- </div>
<div id="filtros" style="float: right;"> -->
  <form class="form form-inline" role="form" action="" method="post">
    <div class="form-group col-md-3">
        <input type="button" class="btn btn-primary"
            onclick=" location.href='' "
            value="Nueva sala" name="boton" />
    </div>
    <div class="form-group form-group-justified col-md-9">
        <p> Busqueda por nombre de sala:
        <input type="text" name="busqueda">
        <button type="submit" class="btn btn-primary">Filtrar</button></p>
    </div>
  </form>
</div>

<div class="container">
  <div class="table-hover table-responsive">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th ><b>Nombre</b></th>
          <th><b>Zona</b></th>
          <th><b>Color</b></th>
          <th><b>Hora inicio</b></th>
          <th><b>Hora fin</b></th>
          <th><b></b></th>
          <th><b></b></th>
        </tr>
        <tbody>
          <?php while($row=$resultado->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $row['nombre_sala'];?>
              </td>
              <td>
                <?php echo $row['nombre'];?>
              </td>
              <td>
                <?php echo $row['color'];?>
              </td>
              <td>
                <?php echo $row['hora_inicio'];?>
              </td>
              <td>
                <?php echo $row['hora_fin'];?>
              </td>
              <td>
                  <button type="button" class="btn btn-secondary"
                  data-toggle="modal" data-target="#modificar"
                  onclick="return llenarSala(<?php echo $row['id_sala'];?>,'<?php echo $row['nombre_sala'];?>')">
                    Modificar
                  </button>
              </td>
              <td>
                  <button type="button" class="btn btn-secondary"
                  data-toggle="modal" data-target="#eliminar"
                  onclick="return llenarSala(<?php echo $row['id_sala'];?>,'<?php echo $row['nombre_sala'];?>')">
                    Eliminar
                  </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </div>
</div>
