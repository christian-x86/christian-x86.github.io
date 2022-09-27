<?php
session_start();
$var=$_GET['producto'];
$titulo="$var";

if (isset($var)) {
$var2="tipo='".$var."' and";
}

if (isset($_POST['orden'])){
  $ordena=$_POST['orden'];
}else{
  $ordena="nombre asc";
}

$busqueda1=$_POST['buscar'];
$busqueda2="nombre like '%".$busqueda1."%'";

require_once('plantilla.inc');
?>
  <div class="container-fluid">
  	<div class="row">
      <div Class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
<?php
require_once('menu_izquierda.inc');
include('conexion.php');
$link=conectar();
$query1=mysql_query("SELECT * FROM producto WHERE ".$var2." ".$busqueda2." ORDER BY ".$ordena.";",$link) OR DIE (mysql_error());
$num=mysql_num_rows($query1);
?>
      </div>
      <div class="col-sm-6 col-md-7 col-lg-8 col-xl-9">
        <div style="padding: 10px;">
          <form action="" method="post" class="form-inline">
            <select class="form-control form-control-custom" name="orden" style="margin-right: 4px;">
              <option disabled selected value> -- Seleccionar -- </option>
              <option value="nombre asc">Nombre: A-Z</option>
              <option value="nombre desc">Nombre: Z-A</option>
              <option value="pvp desc">Por precio descendente</option>
              <option value="pvp asc">Por precio ascendente</option>
            </select>
            <button class="btn btn-primary" type="submit">Ordenar</button>
          </form>
        </div>
<?php
while ($fila = mysql_fetch_row($query1)) {
  if ($num==0) {
    }else{
?>
        <div class="card" style="width:300px; float: left; margin: 20px;">
          <div style="height: 300px; width: 295px;">
            <?php
            $i=$fila[0];
            echo '<a href="producto.php?elemento='.$i.'"><img class="" src="'.$fila[7].'" alt="Card image" style="height:298px; display: block; margin-left: auto; margin-right: auto;"></a>';
            ?>
          </div>
            <div class="card-body">
              <h4 class="card-title">
                <?php
                echo '<a href="producto.php?elemento='.$i.'">'.$fila[1].'</a>';    
                ?>
              </h4>
              <div style="height: 100px;">
                <div style="min-height: 48px;">
                  <p class="card-text">
                  <?php
                  echo $fila[3];
                  ?>
                  </p>
                </div>
                <p class="precio">
                  <?php
                  $precio=number_format($fila[2],2,',','');
                  if (strpos($precio,',00')) {
                    
                    echo ceil($precio)."€";
                  }else{
                    echo $precio."€";
                  }                  
                  ?>
                </p>
              </div>
              <?php
              if ($_SESSION['id_usuario']==1){
                    echo '
                    <form action="form_editar_productos.php" method="post">
                      <input type="hidden" name="id_producto" value="'.$fila[0].'">
                      <button class="btn btn-primary" type="submit">Editar</button>
                    </form>
                    ';
              }else{
              ?>
              <form action="anadir_producto.php" method="post" class="form-inline">
                <label>Cantidad: </label>
                <select class="form-control" style="width: 60px; margin-left: 3px;" name="cantidad">
                  <option value="1" selected>1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <?php
                  echo '<input type="hidden" name="id_producto" value="'.$fila[0].'">';
                  echo"</select>";
                    if ($fila[8]==0) {
                      echo '<button class="btn btn-danger disabled" disabled="disabled" type="submit">Añadir a la cesta<i class="material-icons" style="position: relative; top: 5px;">add_shopping_cart</i></button>';
                    }else{
                      if (isset($_SESSION['id_usuario'])) {
                        echo '<button class="btn btn-primary" type="submit">Añadir a la cesta<i class="material-icons" style="position: relative; top: 5px;">add_shopping_cart</i></button>';
                      }else{
                        echo '<button class="btn btn-primary" type="" data-toggle="tooltip" title="Inicia sesión para añadir productos a la cesta">Añadir a la cesta<i class="material-icons" style="position: relative; top: 5px;">add_shopping_cart</i></button>';
                      }
                    }
                  }
                ?>
              </form>
            </div>
          </div>
<?php
  }
}
?>
      </div>
    </div>
  </div>
<?php
require_once('pie.inc');
?>