<?php
$titulo="TiendaOnline";
session_start();
require_once('plantilla.inc');
?>
  <div class="container-fluid">
    	<div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3" style="margin: 0px; padding: 0px;">
          <?php
          require_once('menu_izquierda.inc');
          ?>
        </div>
        <div class="col-sm-6 col-md-7 col-lg-6 col-xl-7">          

          <div id="demo" class="carousel slide" data-ride="carousel" style="padding: 2%;">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/TiendaOnline/productos/a.png" alt="oneplus" width="100%" height="50%">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="/TiendaOnline/productos/b.jpg" alt="Apple" width="100%" height="50%">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="/TiendaOnline/productos/c.jpg" alt="BQ" width="100%" height="50%">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
          
          <p class="p-div1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
        </div>
        <div class="col-lg-2 col-xl-2">
          <h2 class="p-div">Side</h2>
          <p class="p-div">Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
        </div>
    </div>
  </div>
<?php
require_once('pie.inc');
?>