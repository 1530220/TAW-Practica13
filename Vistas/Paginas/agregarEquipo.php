<?php
  //Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
   $controlador = new MvcController();

  //Se crea un array que va a recibir todos los obejtos 
  $datosDeporte = array();

  //Y se llena ese array con la respuesta con los datos
  $datosDeporte = $controlador -> obtenerDatosDeportes();

?>

<section class="content-header">
    <h1>
        Agregar Equipo
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Equipos </a></li>
        <li class="active">Agregar Equipo</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos del equipo</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
                
                <div class="box-body">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del equipo">
                </div>


                <div class="form-group">    
                    <label for="carrera">Deporte</label>
                    <select class="form-control" name="deporte">
                        <?php

                            for($i = 0; $i < count($datosDeporte); $i++ ){
                                echo '<option value="'.$datosDeporte[$i]['id'].'"> '. $datosDeporte[$i]['nombre'] .' </option>';
                            }
                        
                        ?>
                    </select>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary input-lg" value="Guardar Datos" /> </center>
                </div>
                
            </form>

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

</section>

<?php

//Compara si la variable exista, para que cuando entre sin que se le haya pulsado al boton esto no se accione y trate de hacer algo, eso solo se habilitara cuando el usaurio de click en el boton, es lo que significa
if(isset($_POST['nombre'])){
    
    //Funcion del controlador que permite la lecutra de todas las variables del formulario para reunirlas en un objeto y posteriormente pasarlas al modelo apra que la almacene
    $controlador ->  guardarDatosEquipo();

}

?>