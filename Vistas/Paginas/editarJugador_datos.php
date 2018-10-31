<?php  
  $controller = new MvcController();
  $datos = $controller->getInfoJugador($_GET['jugador']);
  $deporte = $_GET['deporte'];
  $equipo = $_GET['equipo'];

  $flag = false;

  if($_POST){
    $flag = $controller->updateJugador($deporte,$equipo,$_GET['jugador']);
  }
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

      <?php if($flag==false){ ?>
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar informacion para editar jugador</h3>
            </div>
            <br>
            <form class="form-horizontal" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-4 control-label">Nombre :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Nombre del jugador" value="<?php echo $datos['nombre'] ?>" name="nombre" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">E-mail :</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?php echo $datos['email'] ?>" disabled>
                  </div>
                </div>
              </div>
              
              <div class="box-footer">
                <div class="col-lg-5"></div>
                <button type="submit" class="btn btn-warning col-lg-4">Actualizar</button>
              </div>
            </form>
          </div>
    <?php }else{ ?>
        <div class="box box-info">
          <br><br>
        <div class="box-body">
          <div class="alert alert-success alert-dismissible">
              
              <h4><i class="icon fa fa-check"></i> Actualizacion Exitosa!</h4>
              Se ha actualizado informacion del jugador.
          </div>
          <br>
          <div class="row">
            <div class="col-lg-5"></div>
            <a href="?index.php" class="btn btn-warning col-lg-2">Volver</a>
          </div>
        </div>
        </div>
    <?php } ?>
  </section>
