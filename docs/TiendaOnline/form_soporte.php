<?php
session_start();
$titulo="Soporte";
require_once("plantilla.inc")
?>
<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-4 col-lg-3">
        </div>
		<div class="col-sm-9 col-md-8 col-lg-7 form-group">
			<b>
    		<h1 class="p-div1">Centro de soporte</h1>
			</b>
    		<p class="p-div1">Envía una consulta al Servicio de Atención al cliente<p>
		    <div class="container-fluid">
	        	<form class="p-div1" method="post" action="soporte.php">
					<p>*Introduzca su nombre de usuario:</p>
					<input class="form-control form-control-custom" type="text" placeholder="Nombre de usuario" name="nombre_usuario" required>
					<p>*Introduzca su Correo electrónico:</p>
					<input class="form-control form-control-custom" type="text" name="Correo" placeholder="Correo electrónico" required>
					<p>*Asunto:</p>
					<input class="form-control form-control-custom" type="text" name="Asunto" placeholder="Asunto" required>
					<p>*Mensaje:</p>
					<textarea rows="7" class="form-control form-control-custom" type="text" name="Mensaje" placeholder="Mensaje" required></textarea>
					<input class="btn btn-primary btn-custom" type="submit" name="Enviar">
				</form>
		    </div>
		</div>
	</div>
</div>
<?php

require_once('pie.inc');
?>

