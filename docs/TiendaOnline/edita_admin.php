<?php
require_once('plantilla.inc');

$id_producto=$_POST['id_producto'];
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

$sql="SELECT * FROM producto WHERE id_producto = '".$id_producto."'";
$query=mysql_query($sql,$link) OR DIE (mysql_error());

//modificar producto ↓ (por hacer)    mysql_query("UPDATE producto SET nombre='".$id_producto."', nombre WHERE id_producto='';",$link) OR DIE (mysql_error());

if ($nombre && $precio) {

		if ($nombre) {

			echo "<br>El nombre del producto ha cambiado: [".$nombre."]";
			mysql_query("UPDATE producto SET nombre = '".$nombre."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		
		}
		else{
			echo "<br>El nombre del producto no ha cambiado";
		}
		if ($precio) {
			echo "<br> El precio ha cambiado: [".$precio."]";
			mysql_query("UPDATE producto SET pvp = ".$precio." WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>El precio no ha cambiado";
		}
		if ($descripcion) {
			echo "<br>La descripción ha cambiado: [".$descripcion."]";
			mysql_query("UPDATE producto SET descripcion = '".$descripcion."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>La descripción no ha cambiado";
		}
		if ($especificaciones) {
			echo "<br> Las especificaciones han cambiado: [".$especificaciones."]";
			mysql_query("UPDATE producto SET especificaciones = '".$especificaciones."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>Las especificaciones no ha cambiado";
		}
		if ($tipo) {
			echo "<br>El tipo ha cambiado: [".$tipo."]";
			mysql_query("UPDATE producto SET tipo = '".$tipo."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>El tipo no ha cambiado";
		}
		if ($marca) {
			echo "<br> La marca ha cambiado: [".$marca."]";
			mysql_query("UPDATE producto SET marca = '".$marca."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>La marca no ha cambiado";
		}
		if ($urlimagen) {
			echo "<br> La URL de la imágen ha cambiado: [".$urlimagen."]";
			mysql_query("UPDATE producto SET urlimagen = '".$urlimagen."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>La URL de la imágen no ha cambiado";
		}
		if ($stock) {
			echo "<br> El stock ha cambiado: [".$stock."]";
			mysql_query("UPDATE producto SET stock = '".$stock."' WHERE id_producto = '".$id_producto."';",$link) OR DIE (mysql_error());
		}
		else{
			echo " <br>El stock no ha cambiado";
		}

	}else{
	echo "Producto no actualizado";
}

require_once('pie.inc');
?>