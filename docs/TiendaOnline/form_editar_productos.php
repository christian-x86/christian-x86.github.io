<?php
$titulo="Añadir productos";
require_once('plantilla.inc');
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
<?php
require_once('menu_izquierda.inc');

include ('conexion.php');
$link=conectar();
$query=mysql_query("SELECT * FROM producto WHERE id_producto=".$_POST['id_producto'].";",$link);
$fila=mysql_fetch_row($query);

$result = mysql_query("SHOW COLUMNS FROM producto LIKE 'tipo';",$link) OR DIE(mysql_error());

$fila_tipo=mysql_fetch_row($result);
$sub=substr($fila_tipo[1], 6);
$sub=substr($sub, 0,(strlen($sub)-2));
$array1= explode("','", $sub);

?> 
      </div>
      <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7"> 
        <form class="p-div1" method="post" action="edita_admin.php">

        <?php
          echo '
          
          <input type="hidden" name="id_producto" value="'.$fila[0].'">
          <p>Nombre del producto:</p>
          <input class="form-control form-control-custom" type="text" name="nombre" value="'.$fila[1].'" required>
          <p>Precio:</p>
          <input class="form-control form-control-custom" type="number" step="0.01" name="precio" value="'.$fila[2].'" required>
          <p>Descripción:</p>
          <input class="form-control form-control-custom" type="text" name="descripcion" value="'.$fila[3].'">
          <p>Especificaciones:</p>
          <textarea class="form-control form-control-custom" type="text-area" name="especificaciones" rows="7">'.$fila[4].'</textarea>
          <p>Tipo:</p>
          <select class="form-control form-control-custom" type="text" name="tipo"  required>
          <option>-- Seleccionar --</option>';
foreach ($array1 as $tipo) {
if ($fila[5]==$tipo) {
  echo '<option selected value="'.$tipo.'">'.$tipo.'</option>';
}else{
  echo '<option value="'.$tipo.'">'.$tipo.'</option>';
}
}                  
          echo '
          </select>
          <p>Marca:</p>
          <input class="form-control form-control-custom" type="text" name="marca" value="'.$fila[6].'">
          <p>URL imagen:</p>
          <input class="form-control form-control-custom" type="text" name="urlimagen" value="'.$fila[7].'">
          <p>Stock: </p>
          <input class="form-control form-control-custom" type="number" name="stock" value="'.$fila[8].'" required>
          <input class="btn btn-primary btn-custom" type="submit" name="Enviar">
          ';
          ?>
          </form>
        </div>
        <div class="col-lg-2 col-xl-2">
        </div>
      </div>
    </div>
<?php
require_once('pie.inc');
?>