<?php
session_start();
$titulo="Pedido";
require_once('plantilla.inc');

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
        </div>
        <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7"> 
<?php
include ('conexion.php');

$id_cesta1=$_SESSION['id_cesta'];

function Cesta2Pedido($id_cesta) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=TiendaOnline3", "root", "");
 
        // comando de llamada del procedimiento almacenado 
        $sql = 'CALL Cesta2Pedido(:pidCesta,@p)';

        //establecemos que lance excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepara para la ejecucion del procedimiento almacenado
        $stmt = $pdo->prepare($sql);
 
        // pasa valor al comando
        $stmt->bindParam(':pidCesta', $id_cesta);
 
        // ejecuta el procedimiento almacenado
        $stmt->execute();
 
        $stmt->closeCursor();
 
        // ejecuta la segunda consulta para obtener 'pcodPedido'
        $row = $pdo->query("SELECT @p AS pcodPedido")->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $row !== false ? $row['pcodPedido'] : null;
        }
    } catch (PDOException $e) {
        $message=$e->getMessage();
        echo $message;
        ?>
        </div></div></div>
        <?php
        require_once('pie.inc');
        die;
    }
    return null;
}

Cesta2Pedido($id_cesta1);

if (!$message) {
echo   '<p>Pedido relizado correctamente</p>
        <a href="mis_pedidos.php" class="btn btn-primary">Mis pedidos</a>
        <button class="btn btn-danger disabled" disabled>Proceder a pagar</button>';
}            
?>
        </div>
    </div>
</div>
<?php
require_once('pie.inc');
?>