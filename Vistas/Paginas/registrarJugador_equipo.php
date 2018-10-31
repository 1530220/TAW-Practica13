<?php  
  $controller = new MvcController();
  $equipos = $controller->getTeamsController($_GET['deporte']);
?>

<section class="content-header">
    <h1>
      Registrar Jugador
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Jugadores</a></li>
      <li><a href="#"> Registrar Jugador</a></li>
    </ol>
    <br><br>

      <br>
      <div class="box-header ">
        <h3 class="box-title">¿A que equipo pertenecera el nuevo jugador?</h3>
      </div>
      <br>
      <div class="row">
        <?php foreach ($equipos as $equipo) { ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $equipo['nombre'] ?></h3><br>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="?action=registrarJugador_jugador&deporte=<?php echo $_GET['deporte'] ?>&equipo=<?php echo $equipo['id']?>" class="small-box-footer">
                Seleccionar <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>
        <?php } ?>
      </div>

  </section>
