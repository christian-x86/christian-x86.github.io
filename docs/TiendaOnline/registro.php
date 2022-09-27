<?php
session_start();
$titulo="Registro";
require_once('plantilla.inc');

$nombre_usuario = $_POST['nombre_usuario'];
$contrasena1 = $_POST['contrasena1'];
$contrasena2 = $_POST['contrasena2'];
$email = $_POST['email'];

if ($contrasena1!=$contrasena2) {
    $resultado="Las contraseñas no coinciden";

}else{

    include("conexion.php");
    $link=conectar(); 

    $sql="SELECT * FROM usuario WHERE email='".$email."'";
    $query=mysql_query($sql,$link) OR DIE (mysql_error());

    $sql2="SELECT * FROM usuario WHERE nombre_usuario='".$nombre_usuario."'";
    $query2=mysql_query($sql2,$link) OR DIE (mysql_error());

    if ((mysql_num_rows($query2)!=0) || (mysql_num_rows($query)!=0)){
        if (mysql_num_rows($query2)!=0) {
            $resultado="Error: nombre de usuario ya se ha registrado";
        }
        if (mysql_num_rows($query)!=0) {
            $resultado="Error: email ya ingresado";
        }
    }else{

    	if($nombre_usuario && $contrasena1 && $email){
    		mysql_query("INSERT INTO usuario (nombre_usuario, contrasena, email, fecha_registro) VALUES ('".$nombre_usuario."',MD5('".$contrasena1."'),'".$email."', curdate());",$link) OR DIE (mysql_error());

                    $resultado="Usuario registrado correctamente.";

            }else{
    				$resultado="Debe introducir los datos obligatorios";          
    	}
    }
}

mysql_close($link);

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