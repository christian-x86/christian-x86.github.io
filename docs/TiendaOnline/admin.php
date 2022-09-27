<?php
$titulo="Añadir productos";
require_once('plantilla.inc');
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
        <?php
require_once('menu_izquierda.inc');
include('conexion.php');
$link=conectar();
$result = mysql_query("SHOW COLUMNS FROM producto LIKE 'tipo';",$link) OR DIE(mysql_error());

$fila_tipo=mysql_fetch_row($result);
$sub=substr($fila_tipo[1], 6);
$sub=substr($sub, 0,(strlen($sub)-2));
$array1= explode("','", $sub);
?>
      </div>
<div class="col-sm-6 col-md-7 col-lg-6 col-xl-7"> 
        <form class="p-div1" method="post" action="inserta_admin.php">
          <p>Nombre del producto:</p>
          <input class="form-control form-control-custom" type="text" name="nombre" required>
          <p>Precio:</p>
          <input class="form-control form-control-custom" type="number" step="0.01" name="precio" required>
          <p>Descripción:</p>
          <input class="form-control form-control-custom" type="text" name="descripcion">
          <p>Especificaciones:</p>
          <textarea class="form-control form-control-custom" type="text-area" name="especificaciones" rows="7"></textarea>
          <p>Tipo:</p>
          <select class="form-control form-control-custom" type="text" name="tipo" required>
            <option disabled selected value>-- Seleccionar --</option>
<?php
foreach ($array1 as $tipo) {
      echo '<option value="'.$tipo.'">'.$tipo.'</option>';
}
?>
          </select>
          <p>Marca:</p>
          <input class="form-control form-control-custom" type="text" name="marca">
          <p>URL imagen:</p>
          <input class="form-control form-control-custom" type="text" name="urlimagen">
          <p>Stock: </p>
          <input class="form-control form-control-custom" type="number" name="stock" required>
          <input class="btn btn-primary btn-custom" type="submit" name="Enviar">
        </form>
      </div>
      <div class="col-lg-2 col-xl-2">
      </div>
    </div>
  </div>
<?php
require_once('pie.inc');
?>