<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <label class="navbar-brand" href="">Categorías</label>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <div class="container-fluid btn-group-vertical" style="padding: 0px;">
      <div class="container-fluid">
        <a type="button" class="btn btn-primary btn-block" href="productos.php?producto=MOVIL">Móviles</a>
      </div>
        <div class="container-fluid">
        <a type="button" class="btn btn-primary btn-block" href="productos.php?producto=TABLET">Tablets</a>
      </div>
      <div class="container-fluid">
        <a type="button" class="btn btn-primary btn-block" href="productos.php?producto=PC">Ordenadores</a>
      </div>
      <div class="dropdown container-fluid">
        <a type="button" id="drop1" class="btn btn-primary btn-block dropdown-toggle container-fluid"  data-toggle="dropdown" href="#">Periféricos</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="productos.php?producto=RATON">Ratones</a>
            <a class="dropdown-item" href="productos.php?producto=TECLADO">Teclados</a>
            <a class="dropdown-item" href="productos.php?producto=MONITOR">Monitores</a>
          </div>
      </div>
      <div class="dropdown container-fluid">
        <a type="button" id=drop2 class="btn btn-primary btn-block dropdown-toggle container-fluid"  data-toggle="dropdown" href="#">Componentes</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="productos.php?producto=CPU">Procesadores</a>
          <a class="dropdown-item" href="productos.php?producto=PLACA_BASE">Placas base</a>
          <a class="dropdown-item" href="productos.php?producto=GPU">Tarjetas gráficas</a>
          <a class="dropdown-item" href="productos.php?producto=HDD">Discos duros</a>
          <a class="dropdown-item" href="productos.php?producto=RAM">Memorias RAM</a>
          <a class="dropdown-item" href="productos.php?producto=PSU">Fuentes de alimentación</a>
          <a class="dropdown-item" href="productos.php?producto=CAJAS">Cajas</a>
        </div>
      </div>
    </div>
  </div>
</nav>