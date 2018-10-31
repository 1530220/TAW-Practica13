<?php
    $controlador = new MvcController();//Llamar al controlador
    $datosDeporte = array();//Hacer array para los datos
    $datosDeporte = $controlador->obtenerDatosDeporteId();//Obtener los datos del usuario
?>
<section class="content-header">
    <h1>
        Editar Deporte
        
    </h1>
     <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Deportes</a></li>
        <li class="active">Editar Deporte</li>
    </ol>
    <div class="box box-primary">
           
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method='post'>
              <div class="box-body">

                <div class="form-group">
                  <label for="id">Id del Deporte</label>
                  <input type="text" class="form-control" name="id" value="<?= $datosDeporte[0]['id'] ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" placeholder="Escribe nombre del deporte" name="nombre" value="<?= $datosDeporte[0]['nombre'] ?>" required>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" value="Actualizar">Enviar</button>
              </div>
            </form>
          </div>

</section>

<?php
if(isset($_POST['nombre'])){
        
    $controlador -> editarDatosDeporte();

}

?>