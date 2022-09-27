<?php
$titulo="Iniciar sesión";
require_once('plantilla.inc');
?>
<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-4 col-lg-3">

        </div>
		<div class="col-md-8 col-lg-9 col-sm-9 form-group">
			<h2 class="p-div1">Iniciar sesión</h2>
			<form class="p-div1" method="post" action="iniciar_sesion.php">
				<p>Introduzca su email o nombre de usuario:</p>
				<input class="form-control form-control-custom" type="text" placeholder="Nombre de usuario o email" name="nombre" required>
				<p>Introduzca su contraseña:</p>
				<input class="form-control form-control-custom" type="password" name="contrasena" placeholder="Contraseña" required>
				<input class="btn btn-primary btn-custom" type="submit" name="Enviar">
			</form>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>