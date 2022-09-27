<?php
$titulo="Registro";
require_once('plantilla.inc');
?>
<div class="container-fluid">
  	<div class="row">
        <div class="col-sm-3 col-md-4 col-lg-3">
	        <!--
	        <h2 class="p-div">Side</h2>
	        require_once('menu_izquierdo.ini')
	        <p class="p-div">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
	      	-->
        </div>

		<div class="col-md-8 col-lg-9 col-sm-9 form-group">
			<h2 class="p-div1">Registro</h2>
			<form class="p-div1" method="post" action="registro.php">
				<p>Introduzca su correo electrónico:</p>
				<input class="form-control form-control-custom" type="text" name="email" placeholder="Email" required>
				<p>Introduzca un nombre de usuario:</p>
				<input class="form-control form-control-custom" type="text" name="nombre_usuario" placeholder="Nombre usuario" required>
				<p>Introduzca una contraseña:</p>
				<input class="form-control form-control-custom" type="password" name="contrasena1" placeholder="Contraseña" required>
				<p>Vuelva a introducir la contraseña:</p>
				<input class="form-control form-control-custom" type="password" name="contrasena2" placeholder="Contraseña" required>
				<input class="btn btn-primary btn-custom" type="submit" name="Enviar">
			</form>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>