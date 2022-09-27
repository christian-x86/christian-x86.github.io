<?php
session_start();

$nombre_usuario = $_POST['nombre_usuario'];
$contrasena1 = $_POST['contrasena1'];
$contrasena2 = $_POST['contrasena2'];
$email = $_POST['email'];
$id_usuario = $_SESSION['id_usuario'];

$titulo="Preferencias de usuario";
require_once('plantilla.inc');
include("conexion.php");
$link=conectar();

if ($contrasena1!=$contrasena2) {
    echo "Las contraseñas no coinciden";

}else{

	echo "<br>Ok, El id_usuario coincide";

	$sql="SELECT * FROM usuario WHERE id_usuario = '".$id_usuario."'";
	$query=mysql_query($sql,$link) OR DIE (mysql_error());

	$sql2="SELECT * FROM usuario WHERE email = '".$email."'";
	$query2=mysql_query($sql2,$link) OR DIE (mysql_error());

	$sql3="SELECT * FROM usuario WHERE nombre_usuario = '".$nombre_usuario."'";
	$query3=mysql_query($sql3,$link) OR DIE (mysql_error());

	if ($email) {

		if (mysql_num_rows($query2)==0) {
			echo "<br>El email ha cambiado: [".$email."]";
		mysql_query("UPDATE usuario SET email = '".$email."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			echo "<br>Este email ya se ha registrado";
		}
	}else{
		echo "<br>El email no ha cambiado";
	}
	if ($nombre_usuario) {

		if (mysql_num_rows($query3)==0) {
			echo "<br>El nombre de usuario ha cambiado: [".$nombre_usuario."]";
		mysql_query("UPDATE usuario SET nombre_usuario = '".$nombre_usuario."' WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
		}else{
			echo "<br>Este nombre de usuario ya está en uso";
		}
	}
	else{
		echo "<br>El nombre de usuario no ha cambiado";
	}
	if ($contrasena1) {
		echo "<br> La contraseña ha cambiado: [".$contrasena1."]";
		mysql_query("UPDATE usuario SET contrasena = MD5('".$contrasena1."') WHERE id_usuario = '".$id_usuario."';",$link) OR DIE (mysql_error());
	}
	else{
		echo " <br>La contraseña no ha cambiado";
	}
}

require_once('pie.inc');
?>
