<?php
session_start();
$titulo="Mis Pedidos";
require_once('plantilla.inc');
include('conexion.php');
$link=conectar();
$pedido=mysql_query("SELECT * FROM incluye JOIN producto ON incluye.id_producto=producto.id_producto WHERE id_pedido=".$_POST['un_pedido'].";", $link) OR DIE(mysql_error());

$cabecera=mysql_query("SELECT * FROM pedido WHERE id_pedido=".$_POST['un_pedido'].";",$link) OR DIE(mysql_error());
$fila_cabecera=mysql_fetch_row($cabecera);

?>

<div class="container-fluid">
   	<div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
 		</div>
        <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7"> 

<?php

echo '<h2 class="p-div1"> Información del pedido</h2>';
echo "<br> ID Pedido: ".$fila_cabecera[0];
echo "<br> Fecha pedido: ".$fila_cabecera[2];
echo "<br> Estado: ".$fila_cabecera[3];
echo "<br> Dirección: ".$fila_cabecera[4];
echo "<br> Código postal: ".$fila_cabecera[5];
echo "<br> Provincia: ".$fila_cabecera[6];
echo "<br> Localidad: ".$fila_cabecera[7];

$total=0;
while ($fila=mysql_fetch_row($pedido)){

echo '<div style="border: solid rgba(80,80,80,0.7); border-radius: 10px; margin-bottom:3px; padding: 10px;" class="media"><div class="media-body">';
echo "<p><b>Cantidad: </b>".$fila[3]."</p>";
echo "<p><b>Nombre: </b>".$fila[5]."</p>";
echo "<p><b>Marca: </b>".$fila[10]."</p>";

echo '<p class="precio">'.$fila[2].'€</p><h4 class="media-heading"></h4>';

echo '</div>';
	 			
echo '<div class="media-left media-middle"><img class"media-object" src="'.$fila[11].'" style="height: 175px; padding: 5px;"></div></div>';
$total=$total+($fila[6]*$fila[3]);
};
echo '<br><p class="precio">Total: '.$total.'€</p>';
if ($fila_cabecera[3]=="CANCELADO") {
	echo
	'<form action="" method="post">
		<input type="hidden" name="id_pedido" value="">
		<button style="margin: 5px;" class="btn btn-danger disabled" type="submit" disabled>Cancelar pedido</button>
	</form>
	';
}else{
	echo
	'<form action="cancelar_pedido.php" method="post">
		<input type="hidden" name="id_pedido" value="'.$fila_cabecera[0].'">
		<button style="margin: 5px;" class="btn btn-danger" type="submit">Cancelar pedido</button>
	</form>
	';
}
?>
			<a href="mis_pedidos.php"class="btn btn-primary" style="margin: 5px;">Volver a la lista de pedidos</a>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>