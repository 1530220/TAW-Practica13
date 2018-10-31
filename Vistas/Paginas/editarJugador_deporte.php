<?php  
  $controller = new MvcController();
  $deportes = $controller->getAllController("deporte");
?>

<section class="content-header">
    <h1>
      Editar Jugador
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Jugadores</a></li>
      <li><a href="#"> Editar Jugador</a></li>
    </ol>
    <br><br>

      <br>
      <div class="box-header ">
        <h3 class="box-title">¿Cual sera el nuevo deporte al que pertenecera el jugador?</h3>
      </div>
      <br>
      <div class="row">
        <?php foreach ($deportes as $deporte) { ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $deporte['nombre'] ?></h3><br>
              </div>
              <div class="icon">
                <i class="fa fa-futbol-o"></i>
              </div>
              <a href="?action=editarJugador_equipo&deporte=<?php echo $deporte['id'] ?>&jugador=<?php echo $_GET['jugador'] ?>" class="small-box-footer">
                Seleccionar <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
        </div>
        <?php } ?>
      </div>

  </section>
