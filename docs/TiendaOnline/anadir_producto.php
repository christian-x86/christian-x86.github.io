<?php
session_start();
$id_producto=$_POST['id_producto'];
$cantidad=$_POST['cantidad'];
$titulo="Añadir a la cesta";
require_once('plantilla.inc');
include('conexion.php');
$link=conectar();

if (isset($_SESSION['id_usuario'])) {
	
	$query1=mysql_query("SELECT id_cesta FROM cesta WHERE id_usuario=".$_SESSION['id_usuario'].";", $link) OR DIE (mysql_error());
	$num=mysql_num_rows($query1);
	if ($num==0) {
		mysql_query("INSERT INTO cesta (id_usuario, fecha) VALUES (".$_SESSION['id_usuario'].", curdate());", $link) OR DIE (mysql_error());

	$query1=mysql_query("SELECT id_cesta FROM cesta WHERE id_usuario=".$_SESSION['id_usuario'].";", $link) OR DIE (mysql_error());

		$fila1 = mysql_fetch_row($query1);
		$id_cesta=$fila1[0];
		echo "Producto añadido correctamente a la cesta.";
		echo "<br>id_cesta: $id_cesta";
		mysql_query("INSERT INTO contiene VALUES (".$id_cesta.", ".$id_producto.", ".$cantidad.");", $link) OR DIE (mysql_error());
	}else{
	$fila1 = mysql_fetch_row($query1);

	 	$id_cesta = $fila1[0];

	$query2=mysql_query("SELECT * FROM contiene WHERE id_producto=".$id_producto." and id_cesta=".$id_cesta.";", $link) OR DIE (mysql_error());
	$num2=mysql_num_rows($query2);
	$fila2 = mysql_fetch_row($query2);
	if ($num2==0) {
		mysql_query("INSERT INTO contiene VALUES (".$id_cesta.", ".$id_producto.", ".$cantidad.");", $link) OR DIE (mysql_error());
		echo "Producto añadido a la cesta correctamente.";
	}else{
		echo "Este producto ya estaba en la cesta, se ha actualizado la cantidad a: $cantidad<br>";

	 	$id_cesta = $fila2[0];
	 	$id_producto = $fila2[1];
	 	mysql_query("UPDATE contiene SET cantidad=".$cantidad." WHERE id_producto='".$id_producto."' and id_cesta='".$id_cesta."';", $link) OR DIE (mysql_error());
		 	
		}
	}
}else{

	$id_cesta=1;
	$query3=mysql_query("SELECT * FROM producto WHERE id_producto=".$id_producto.";", $link) OR DIE (mysql_error());
	$fila3=mysql_fetch_array($query3);

	$cesta[$id_cesta]=array('id_cesta'=>$id_cesta, 'id_producto'=>$id_producto, 'cantidad'=>$cantidad,
	'urlimagen'=>$fila3['urlimagen'],'precio'=>$fila3['pvp'], 'tipo'=>$fila3['tipo']);

	$i=1;
	while (isset($_SESSION['cesta'.$i])) {
		if ($cesta[1]['id_producto']==$_SESSION['cesta'.$i][1]['id_producto']) {
			echo "<br>EL PRODUCTO YA ESTABA EN LA CESTA";
			$_SESSION['cesta'.$i]=$cesta;
			$d=1;
		}
		echo $i;
		print_r($_SESSION['cesta'.$i]);
		echo "<br>";
		$i++;
	}
	if (isset($d)) {
		echo "El producto ya estaba, la cantidad se ha actualizado.";
	}else{
		$_SESSION['cesta'.$i]=$cesta;
		echo $i;
		print_r($_SESSION['cesta'.$i]);
	}
}
?>