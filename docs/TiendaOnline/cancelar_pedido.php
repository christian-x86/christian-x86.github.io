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

$id_pedido1=$_POST['id_pedido'];

function CancelaPedido($id_pedido) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=TiendaOnline3", "root", "");
 
        // comando de llamada del procedimiento almacenado 
        $sql = 'CALL CancelaPedido(:pidPedido)';

        //establecemos que lance excepciones
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepara para la ejecucion del procedimiento almacenado
        $stmt = $pdo->prepare($sql);
 
        // pasa valor al comando
        $stmt->bindParam(':pidPedido', $id_pedido);
 
        // ejecuta el procedimiento almacenado
        $stmt->execute();
 
        $stmt->closeCursor();

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

CancelaPedido($id_pedido1);

if (!$message) {
    echo '
    <p>Pedido cancelado</p>
    <a class="btn btn-primary" href="mis_pedidos.php">Volver a la lista de pedidos</a>';
}            
?>
        </div>
    </div>
</div>
<?php
require_once('pie.inc');
?>