<?php
session_start();
$titulo = "Información envío";
require_once('plantilla.inc');
?>
<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-4 col-lg-3">
        </div>
		<div class="col-sm-9 col-md-8 col-lg-7 form-group">
			<h2 class="p-div1">Información de envío</h2>
			<form class="p-div1" method="post" action="modificar_dir_envio.php">
				<p>Dirección:</p>
				<input class="form-control form-control-custom" type="text" name="direccion" required>
				<p>Código postal:</p>
				<input class="form-control form-control-custom" type="text" name="cp" required>
				<p>Provincia:</p>
				<select class="form-control form-control-custom" name="provincia">
					 <option disabled selected value> -- Seleccionar -- </option>
				    <option value='alava'>Álava</option>
				    <option value='albacete'>Albacete</option>
				    <option value='alicante'>Alicante/Alacant</option>
				    <option value='almeria'>Almería</option>
				    <option value='asturias'>Asturias</option>
				    <option value='avila'>Ávila</option>
				    <option value='badajoz'>Badajoz</option>
				    <option value='barcelona'>Barcelona</option>
				    <option value='burgos'>Burgos</option>
				    <option value='caceres'>Cáceres</option>
				    <option value='cadiz'>Cádiz</option>
				    <option value='cantabria'>Cantabria</option>
				    <option value='castellon'>Castellón/Castelló</option>
				    <option value='ceuta'>Ceuta</option>
				    <option value='ciudadreal'>Ciudad Real</option>
				    <option value='cordoba'>Córdoba</option>
				    <option value='cuenca'>Cuenca</option>
				    <option value='girona'>Girona</option>
				    <option value='laspalmas'>Las Palmas</option>
				    <option value='granada'>Granada</option>
				    <option value='guadalajara'>Guadalajara</option>
				    <option value='guipuzcoa'>Guipúzcoa</option>
				    <option value='huelva'>Huelva</option>
				    <option value='huesca'>Huesca</option>
				    <option value='illesbalears'>Illes Balears</option>
				    <option value='jaen'>Jaén</option>
				    <option value='acoruña'>A Coruña</option>
				    <option value='larioja'>La Rioja</option>
				    <option value='leon'>León</option>
				    <option value='lleida'>Lleida</option>
				    <option value='lugo'>Lugo</option>
				    <option value='madrid'>Madrid</option>
				    <option value='malaga'>Málaga</option>
				    <option value='melilla'>Melilla</option>
				    <option value='murcia'>Murcia</option>
				    <option value='navarra'>Navarra</option>
				    <option value='ourense'>Ourense</option>
				    <option value='palencia'>Palencia</option>
				    <option value='pontevedra'>Pontevedra</option>
				    <option value='salamanca'>Salamanca</option>
				    <option value='segovia'>Segovia</option>
				    <option value='sevilla'>Sevilla</option>
				    <option value='soria'>Soria</option>
				    <option value='tarragona'>Tarragona</option>
				    <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
				    <option value='teruel'>Teruel</option>
				    <option value='toledo'>Toledo</option>
				    <option value='valencia'>Valencia/Valéncia</option>
				    <option value='valladolid'>Valladolid</option>
				    <option value='vizcaya'>Vizcaya</option>
				    <option value='zamora'>Zamora</option>
				    <option value='zaragoza'>Zaragoza</option>
				</select>
				<p>Localidad:</p>
				<input class="form-control form-control-custom" type="text" name="localidad" required>
				<input class="btn btn-primary btn-custom" type="submit" name="Enviar">
			</form>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>