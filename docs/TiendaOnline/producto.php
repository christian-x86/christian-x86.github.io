<?php
session_start();
$elemento=$_GET['elemento'];
include('conexion.php');
$link=conectar();
$query=mysql_query("SELECT * FROM producto WHERE id_producto='".$elemento."';",$link) OR DIE (mysql_error());
$fila=mysql_fetch_row($query);
$titulo="$fila[1]";
require_once('plantilla.inc');
?>
  <div class="container-fluid">
    	<div class="row">
        <div class="col-sm-3 col-md-3 col-lg-2" style="margin: 0px; padding: 0px;">
          <?php
          require_once('menu_izquierda.inc');
          ?>
        </div>
          <div class="col-sm-6 col-md-6 col-lg-8">
            <h2 style="margin-left: 7%; margin-top: 2%;">
               <?php
               echo $fila[1];
               ?>
             </h2>
            <div>
              <?php
              echo '<img src="'.$fila[7].'" alt="image" style="max-width: 80%; display: block; margin-left: auto; margin-right: auto;">';
              ?>
              <div>
                <div>
                  <p><b>Descripción:</b>
                    <?php
                    echo $fila[3];
                    ?>
                  </p>
                  <p><b>Características:</b>
                    <?php
                    echo $fila[4];
                    ?>
                  </p>
                  <p style="font-family: ;font-weight:  ;font-size: 50px;">
                    <?php
                    echo $fila[2];
                    ?>€
                  </p>
                </div>
                <button class="btn btn-primary">Añadir a la cesta<i class="material-icons">add_shopping_cart</i></button>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2">
          <h2 class="p-div">Side</h2>
          <p class="p-div">Texto de ejemplo</p>
        </div>
    </div>
  </div>
<?php
require_once('pie.inc');
?>