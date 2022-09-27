<?php
session_start();
unset($_SESSION['id_usuario']);
session_destroy();
$titulo="Cerrar Sesión";
$meta='<meta http-equiv="refresh" content="2;URL=index.php" />';
require_once('plantilla.inc');
?>
	<div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-3">
          <h2 class="p-div">Side</h2>
          <!-- require_once('menu_izquierdo.ini') -->
          <p class="p-div">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
        </div>
      <div class="col-md-8 col-lg-9">
          <h2 class="p-div1">Main Content</h2>
          <p class="p-div1">Sesión cerrada correctamente</p>
          <a href="index.php" class="p-div1">Volver a la página principal</a>
      </div>
  </div>
</div>
<?php
require_once('pie.inc');
?>