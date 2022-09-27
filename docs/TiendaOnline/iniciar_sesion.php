<?php
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

include("conexion.php");

$link=conectar(); 

$sql="SELECT * FROM usuario WHERE (email='".$nombre."' or nombre_usuario='".$nombre."')and contrasena=MD5('".$contrasena."')";

$query=mysql_query($sql,$link) OR DIE (mysql_error());

if(mysql_num_rows($query)==0){
	$resultado="Error, nombre de usuario/email o contraseña incorrectas.";
	}else{
		
		session_start();

		$id_usuario = mysql_result(mysql_query("SELECT id_usuario FROM usuario WHERE (email='".$nombre."' or nombre_usuario='".$nombre."')and contrasena=MD5('".$contrasena."')"), 0);
		$_SESSION['id_usuario'] = $id_usuario;
	
		$resultado="Sesión iniciada correctamente";
	}

mysql_close($link);

$titulo="Iniciar sesión";
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
		        <p class="p-div1">
		        	<?php
		        	echo $resultado;
		        	?>
		        	<br><a href="index.php">Volver a la página principal</a>
		        </p>
	    	</div>
		</div>
	</div>
<?php
require_once('pie.inc');
?>