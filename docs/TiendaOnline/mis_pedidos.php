<?php
session_start();
$titulo="Mis Pedidos";
require_once('plantilla.inc');
include('conexion.php');
$link=conectar();
$lista_pedidos=mysql_query("SELECT * FROM pedido WHERE id_usuario=".$_SESSION['id_usuario'].";", $link) OR DIE(mysql_error());
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
        </div>
    	<div class="col-sm-6 col-md-7 col-lg-6 col-xl-7">
<?php
while ($fila=mysql_fetch_row($lista_pedidos)){

$resultado=mysql_query("SELECT sum(pvp*cantidad)as total from incluye WHERE id_pedido=".$fila[0].";",$link) OR DIE(mysql_error());
$fila_resultado=mysql_fetch_row($resultado);
echo "<b>";
echo "<hr>";
echo "<br> ID PEDIDO: ".$fila[0];
echo "<br> FECHA: ".$fila[2];
echo "<br> ESTADO: ".$fila[3];
echo "<br> DIRECCION: ".$fila[4];
echo "<br> CÓDIGO POSTAL: ".$fila[5];
echo "<br> PROVINCIA: ".$fila[6];
echo "<br> LOCALIDAD: ".$fila[7];
/*echo "<br> METODO_PAGO: ".$fila[8];
echo "<br> METODO_ENVIO: ".$fila[9];*/
echo "<br> IVA: ".$fila[10]."%";
echo "<br>";
echo "<p>TOTAL: ".number_format($fila_resultado[0],2,',','')."€</p>";
$sin_iva=$fila_resultado[0]/("1.$fila[10]");
echo "Sin IVA: ".number_format($sin_iva,2,',','')."€<br>";
echo "</b>";
echo '
<form action="un_pedido.php" method="post">
	<input type="hidden" name="un_pedido" value="'.$fila[0].'">
	<button style="margin: 5px;" class="btn btn-primary" type="submit">Ver pedido</button>
</form>';

};
?>
		</div>
	</div>
</div>
<?php
require_once('pie.inc');
?>