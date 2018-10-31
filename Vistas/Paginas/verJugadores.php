<?php  
  $controller = new MvcController();

  $jugadores = $controller->getAllController("jugador");
  $deportes = $controller->getAllController("deporte");
  $equipos = $controller->getAllController("equipo");
?>

<section class="content-header">
    <h1>
      Lista de Jugadores
    </h1>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-user"></i> Jugadores</a></li>
      <li><a href="#"> Ver Jugadores</a></li>
    </ol>
    <br><br>

      <br>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Jugadores registrados en el sistema</h3>
        </div>
        <br>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Deporte</th>
                <th>Equipo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($jugadores as $jugador){?>
            <?php 
            foreach ($deportes as $d) {
              if($d['id']==$jugador['deporte']){
                $deporte_jugador = $d['nombre'];
              }
            } 
            foreach ($equipos as $e) {
              if($e['id']==$jugador['equipo']){
                $equipo_jugador = $e['nombre'];
              }
            }
            ?>
            <tr>
              <td><?php echo $jugador['nombre'] ?></td>
              <td><?php echo $jugador['email'] ?></td>
              <td><?php echo $deporte_jugador ?></td>
              <td><?php echo $equipo_jugador ?></td>
              <td><center>
                <a href="?action=perfilJugador&jugador=<?php echo $jugador['id'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                <a href="?action=eliminarJugador&jugador=<?php echo $jugador['id'] ?>" class="btn btn-info"><i class="fa fa-eraser"></i></a>
                </center>
              </td>
            </tr>

            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
  </section>
