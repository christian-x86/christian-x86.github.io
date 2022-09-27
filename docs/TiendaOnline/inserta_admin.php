<?php
require_once('plantilla.inc');

$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$especificaciones=$_POST['especificaciones'];
$tipo=$_POST['tipo'];
$marca=$_POST['marca'];
$urlimagen=$_POST['urlimagen'];
$stock=$_POST['stock'];

include('conexion.php');
          $link=conectar();
          $sql="SELECT * FROM producto;";
          $query=mysql_query($sql,$link) OR DIE (mysql_error());

if ($nombre && $precio) {
	mysql_query("INSERT INTO producto (nombre, pvp, descripcion, especificaciones, tipo, marca, urlimagen, stock) VALUES ('".$nombre."', '".$precio."', '".$descripcion."', '".$especificaciones."', '".$tipo."', '".$marca."', '".$urlimagen."','".$stock."') ;",$link) OR DIE (mysql_error());
	echo "Producto insertado correctamente.";
}else{
	echo "Error, producto no insertado";
}
?>

<?php
require_once('pie.inc');
?>