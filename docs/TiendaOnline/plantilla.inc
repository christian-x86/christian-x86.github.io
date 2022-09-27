<!DOCTYPE html>
<html>
<head>
  <title>
<?php
echo $titulo;
?>
</title>
<?php
session_start();
if ($_POST['tema']) {
	$_SESSION['tema']=$_POST['tema'];
}
if ($_SESSION['tema']) {
	if ($_SESSION['tema']=="claro") {
		$estilo="style.css";
	}else{
		$_SESSION['tema']="oscuro";
		$estilo="style2.css";
	}
}else{
	$_SESSION['tema']="claro";
	$estilo="style.css";
}
?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if ($_SESSION['tema']=="oscuro") {
  	echo '<meta name="theme-color" content="#383838">';
  }
  
  ?>
  <link rel="shortcut icon" type="image/x-icon" href="/TiendaOnline/productos/logo.ico" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php
  echo $meta;
  echo '<link rel="stylesheet" type="text/css" href="'.$estilo.'">';
  ?>
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom: 0px; height: 120px; padding-top: 20px; background-image: url(/TiendaOnline/productos/back2.jpg);">
  <h1><a href="index.php">TiendaOnline</a></h1>
  <p style="color: white;"> Compra hoy, recíbelo mañana con envío totalmente GRATIS.</p> 
</div>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar1">
    	<span class="navbar-toggler-icon"></span>
  	</button>
 	<div class="collapse navbar-collapse" id="collapsibleNavbar1">
		<ul class="navbar-nav">
			<?php
			if (isset($_SESSION['id_usuario'])) {
			/*echo '<label class="navbar-brand" id="sesion">ID Usuario: ';
			print_r($_SESSION['id_usuario']);
			echo "</label>";*/
			?>
			<li><div class="dropdown container-fluid" style="padding-right: 4px; padding-left: 0px">
        <a type="button" id=drop3 class="btn btn-dark btn-block dropdown-toggle container-fluid"  style=" margin: 5px;" data-toggle="dropdown" href="#"><i class="material-icons" style="position: relative; top: 3.5px; font-size:19px; ">account_circle</i> Mi Cuenta</a>
        <div class="dropdown-menu">
        	<?php
        	if ($_SESSION['id_usuario']==1) {
        		echo '<a class="dropdown-item" href="admin.php"><i class="material-icons" style="position: relative; top: 5px;">add_circle</i> Añadir un producto</a>';
        	}
        	?>
          <a class="dropdown-item" href="mis_pedidos.php"><i class="material-icons" style="position: relative; top: 5px;">assignment</i> Mis Pedidos</a>
          <a class="dropdown-item" href="form_modificar.php"><i class="material-icons" style="position: relative; top: 5px;">settings</i> Ajustes</a>
          <form  action="" method="post">
<?php
if ($_SESSION['tema']=="claro") {
		echo '<input type="hidden" name="tema" value="oscuro">';

        echo '<button class="dropdown-item" type="submit"><i class="material-icons" style="position: relative; top: 5px;">brightness_4</i> Cambiar a tema oscuro</button></form>';
}else{
		echo '<input type="hidden" name="tema" value="claro">';

        echo '<button class="dropdown-item" type="submit"><i class="material-icons" style="position: relative; top: 5px;">brightness_4</i> Cambiar a tema claro</button></form>';
}
		
?>
        </div>
      </div>
			</li>
			<li>
				<div class="container-fluid" style="padding-right: 4px; padding-left: 0px">
				<a class="btn btn-dark btn-block container-fluid" style="min-width: 140px;  margin: 5px;" href="cerrar_sesion.php"><i class="material-icons" style="position: relative; top: 3.5px; font-size:19px;">power_settings_new</i> Cerrar sesión</a>
			</div>
			</li>
					</ul>
	</div>
	<form class="form-inline" style="margin-left:2px;width: 50%;" action="productos.php" method="POST">
					<input class="form-control mr-sm-2" style="width: 45%; min-width: 50px;" type="text" name="buscar" placeholder="Buscar en la página" required>
    				<button class="btn btn-dark" style="width: 50px; padding-top: 3px; padding-bottom: 1px;" type="submit"><i class="material-icons" style="padding-top: 5px;">search</i></button>
  				</form>
	<a class="navbar-brand brand-alfa btn btn-dark" href="cesta.php" style="color: white; padding-left:5px; padding-right: 5px;">Mi Cesta<i class="material-icons" style="position: relative; top: 5px;">shopping_cart</i></a>
</nav>
			<?php
			}else{
			?>
			<li style="margin: 5px">
				<a class="btn btn-dark btn-block container-fluid" style="min-width: 125px;" href="form_registro.php"> Registrarse</a>
			</li>	
			<li style="margin: 5px">
				<a class="btn btn-dark btn-block container-fluid" style="min-width: 125px;" href="form_inicio_sesion.php"> Iniciar sesión</a>
			</li>
			</ul>
	</div>
	<form class="form-inline" style="margin-left:2px;width: 50%;" action="productos.php" method="POST">
					<input class="form-control mr-sm-2" style="width: 45%; min-width: 50px;" type="text" name="buscar" placeholder="Buscar en la página" required>
    				<button class="btn btn-dark" style="width: 50px; padding-top: 3px; padding-bottom: 1px;" type="submit"><i class="material-icons" style="padding-top: 5px;">search</i></button>
  				</form>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

	<a class="navbar-brand brand-alfa btn btn-dark" href="" data-toggle="tooltip" title="No has iniciado sesión" style="color: white; padding-left:5px; padding-right: 5px;">Mi Cesta<i class="material-icons" style="position: relative; top: 5px;">shopping_cart</i></a>
</nav>
			<?php
			}
			?>
