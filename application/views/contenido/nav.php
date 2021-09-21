<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"><i class="fa fa-home fa-4x" aria-hidden="true"></i></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://reportes.ferbis.com/index.php/InicioController"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inventario <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= site_url('InventarioController/productos') ?>">Productos</a></li>
            <li><a href="<?= site_url('InventarioController/etiquetado') ?>">Etiquetado NOM-51</a></li>
            <li><a href="<?= site_url('InventarioController/solicitud') ?>">Crear solicitur de impresion</a></li>
            <li><a href="<?= site_url('InventarioController/solicitudes') ?>" id="pagina_solicitudes">Solicitudes de impresion</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Herramientas <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= site_url('HerramientasController/comprobantes_proveedores') ?>">Comprobantes a proveedores</a></li>
            <li><a href="<?= site_url('HerramientasController/notificacion_masiva') ?>"> Notificacion Masiva</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          	 <?= $this->session->userdata('nombre') ?> <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="https://reportes.ferbis.com/">Salir <i class="fa fa-sign-out pull-right" aria-hidden="true"></i></a></li>
            <!--
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
        -->
          </ul>
        </li>


        <li><a href="#"></i></a></li>	
      </ul>
    </div>
  </div>
</nav>