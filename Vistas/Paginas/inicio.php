<?php  
  $controlador = new MvcController();
  $deportes = $controlador->getAllController("deporte");
  $equipos = $controlador->getAllController("equipo");
  $jugadores = $controlador->getAllController("jugador");
?>

<section class="content-header">
    <h1>
      Inicio
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-th"></i> Inicio</a></li>
    </ol>
    <br><br>
    <div class="row">
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($deportes) ?></h3>

              <center><h1>Deportes</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-soccer-ball-o"></i>
            </div>
            <a href="?action=listaDeporte" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo count($equipos) ?></h3>

              <center><h1>Equipos</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?action=listaEquipo" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

    </div>
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($jugadores) ?></h3>

              <center><h1>Jugadores</h1></center>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="?action=verJugadores" class="small-box-footer">
              Ver lista <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    </div>
  </section>