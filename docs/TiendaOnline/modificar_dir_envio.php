<?php
session_start();

$dir = $_POST['direccion'];
$cp = $_POST['cp'];
$prov = $_POST['provincia'];
$loc = $_POST['localidad'];
$id_usuario = $_SESSION['id_usuario'];

$titulo="Preferencias de usuario";
require_once('plantilla.inc');
include("conexion.php");
$link=conectar();

	$sql="SELECT * FROM usuario WHERE id_usuario = '".$id_usuario."'";
	$query=mysql_query($sql,$link) OR DIE (mysql_error());

	if ($dir) {
		$resultado1= "La dirección ha cambiado: [".$dir."]";
		mysql_query("UPDATE usuario SET direccion = '".$dir."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			$resultado1= "No ha cambiado la dirección";
		}
	
	if ($cp) {
		$resultado2= "El código postal ha cambiado: [".$cp."]";
		mysql_query("UPDATE usuario SET codigo_postal = '".$cp."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			$resultado2= "No ha cambiado el código postal";
		}

	if ($prov) {
		$resultado3= "La provincia ha cambiado: [".$prov."]";
		mysql_query("UPDATE usuario SET provincia = '".$prov."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			$resultado3= "No ha cambiado la provincia";
		}

	if ($loc) {
		$resultado4= "La localidad ha cambiado: [".$loc."]";
		mysql_query("UPDATE usuario SET localidad = '".$loc."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			$resultado4= "No ha cambiado la localidad";
		}

?>
<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-4 col-lg-3">
        </div>
		<div class="col-sm-9 col-md-8 col-lg-7 form-group">
			<h2 class="p-div1">Información de envío</h2>
			<p class="p-div1">
				<?php
				echo $resultado1;
				echo $resultado2;
				echo $resultado3;
				echo $resultado4;
				?>
			</p>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>