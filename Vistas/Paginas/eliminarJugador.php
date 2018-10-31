<?php  
  $controller = new MvcController();
  $jugador = $_GET['jugador'];
  $flag = false;

 if($_POST){
 	$flag = $controller->eliminarJugadorController($jugador);
 }
?>
<section class="content-header">
    <h1>
      Registrar Jugador
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i> Jugadores</a></li>
      <li><a href="#">Eliminar Jugador</a></li>
    </ol>
    <br><br>

      <br>

      <?php if($flag==false){ ?>
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar contraseña del usuario en sesion para eliminar un jugador</h3>
            </div>
            <br>
            <form class="form-horizontal" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-4 control-label">Contraseña :</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="contraseña" required>
                  </div>
                </div>

              </div>
              
              <div class="box-footer">
                <div class="col-lg-5"></div>
                <button type="submit" class="btn btn-warning col-lg-4">Guardar</button>
              </div>
            </form>
          </div>
    <?php }else{ ?>
        <div class="box box-info">
          <br><br>
        <div class="box-body">
          <div class="alert alert-success alert-dismissible">
              
              <h4><i class="icon fa fa-check"></i> Borrado Exitoso!</h4>
              Se ha eliminado un jugador del sistema.
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
