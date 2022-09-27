<?php
session_start();
$titulo="Cesta";
require_once('plantilla.inc');
$total=0;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
        </div>
        <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7">
        	<h1>Cesta</h1>
<?php

include ('conexion.php');
$link=conectar();

if ($_GET['eliminar1'] && $_GET['eliminar2']) {
	mysql_query("DELETE FROM contiene WHERE id_producto=".$_GET['eliminar1']." AND id_cesta=".$_GET['eliminar2'].";", $link) OR DIE(mysql_error());}

if ($_GET['cantidad'] && $_GET['cantidad1'] && $_GET['cantidad2']) {
	mysql_query("UPDATE contiene SET cantidad=".$_GET['cantidad']." WHERE id_cesta=".$_GET['cantidad1']." and id_producto=".$_GET['cantidad2'].";", $link) OR DIE(mysql_error());
}

if (isset($_SESSION['id_usuario'])) {

$query_existe=mysql_query("SELECT * FROM cesta WHERE id_usuario=".$_SESSION['id_usuario'].";", $link) OR DIE(mysql_error());
$row=mysql_num_rows($query_existe);

	if ($row==0){
		echo "Cesta vacía.";
	}else{
	
	$query1=mysql_query("SELECT * FROM contiene JOIN cesta ON contiene.id_cesta=cesta.id_cesta WHERE cesta.id_usuario='".$_SESSION['id_usuario']."';",$link) OR DIE (mysql_error());
	$num=mysql_num_rows($query1);

	while ($fila1 = mysql_fetch_row($query1)) {

	 	if ($num==0) {
	 		echo "<p>No se han añadido artículos a la cesta.</p>";
	 	}else{


	 		echo '<div style="border: solid rgba(80,80,80,0.7); border-radius: 10px; margin-bottom:1px;" class="media"><div class="media-body"><p>Cantidad: '.$fila1[2].'</p>';

	$query2=mysql_query("SELECT * FROM producto WHERE id_producto=".$fila1[1].";",$link) OR DIE (mysql_error());

	 		while ($fila2 = mysql_fetch_row($query2)) {
echo '<p class="precio">'.$fila2[2].'€</p><h4 class="media-heading">'.$fila2[1].'</h4>';

echo '<div><form  action="" method="get">';
echo '<input type="hidden" name="eliminar1" value="'.$fila1[1].'">';
echo '<input type="hidden" name="eliminar2" value="'.$fila1[0].'">';
echo '<button class="btn btn-danger" type="submit"><i class="material-icons" style="position: relative; top: 5px;">delete_forever</i> Eliminar</button></form>';

echo '<form  action="" method="get">';
echo '<input type="hidden" name="cantidad1" value="'.$fila1[0].'">';
echo '<input type="hidden" name="cantidad2" value="'.$fila1[1].'">';
echo '			<select name="cantidad">
                  <option value="1" selected>1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
              	</select>';
echo '<button class="btn btn-primary" type="submit">Cantidad</button></form></div></div>';
	 			
echo '<div class="media-left media-middle"><img class"media-object" src="'.$fila2[7].'" style="height: 175px; padding: 5px;"></div></div>';
	 			
	 			$total=$total+($fila2[2]*$fila1[2]);
	 		}
	 	}
	 }
	 echo '<p class="precio">TOTAL: '.$total.'€</p>';

	 $query3=mysql_query("SELECT * FROM usuario WHERE id_usuario=".$_SESSION['id_usuario'].";", $link) OR DIE (mysql_error());
	 $fila3=mysql_fetch_row($query3);

	 if (isset($fila3[9])&&isset($fila3[10])&&isset($fila3[11])&&isset($fila3[12])) {
	 $idcesta=mysql_fetch_row($query_existe);
	 $_SESSION['id_cesta']=$idcesta[0];
	 echo '<a class="btn btn-primary" href="pedido.php"><i class="material-icons" style="position: relative; top: 5px;">done</i> Realizar pedido</a>';
	 }else{
	 	echo "No ha introducido dirección de envío, acceda al siguiente formulario para introducirla.";
		echo '<a class="btn btn-primary" href="form_envio_pedido_req.php">Información de envío</a>';
	 }
	 }
 }else{
 	$i=1;
 	while (isset($_SESSION['cesta'.$i])) {
 		echo "<br>";
 		print_r($_SESSION['cesta'.$i]);
 		$i++;
 	}if ($i==1) {
 		echo "Cesta vacía";
 	}else{
 		echo '<br><p>Sesión no iniciada, inicia sesión o registrate.</p>';
 	}
 }
?>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>