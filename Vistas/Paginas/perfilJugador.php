<?php 
  $controller = new MvcController();

  $datos = $controller->getInfoJugador($_GET['jugador']);
  $deportes = $controller->getAllController("deporte");
  $equipos = $controller->getAllController("equipo");

  foreach ($deportes as $d) {
    if($d['id']==$datos['deporte']){
      $deporte_jugador = $d['nombre'];
    }
  } 
  foreach ($equipos as $e) {
    if($e['id']==$datos['equipo']){
      $equipo_jugador = $e['nombre'];
    }
  }
?>
<section class="content-header">
    <h1>
      Jugador
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Jugadores</a></li>
      <li><a href="#"> Ver Jugador</a></li>
    </ol>
    <br><br>

      <br>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">ID Jugador: <?php echo $datos['id'] ?></h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <h4><strong>Nombre del Jugador: </strong><?php echo $datos['nombre'] ?></h4>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <h4><strong>Correo electronico: </strong><?php echo $datos['email'] ?></h4>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <h4><strong>Deporte: </strong><?php echo $deporte_jugador ?></h4>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
              <h4><strong>Equipo: </strong><?php echo $equipo_jugador ?></h4>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-5"></div>
            <div class="">
              <a href="?action=editarJugador_deporte&jugador=<?php echo $datos['id'] ?>" class="btn btn-warning col-lg-2">Editar</a>
            </div>
          </div>
        </div>
      </div>
  </section>
