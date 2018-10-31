<?php

//Vista que despliega el formulario para editar los datos de un equipo, este formulario es llenado automatiamente con la informacion del usuario que le corresponde el id pasada en el metodo GET

$controlador = new MvcController();

$datosEquipo = array();


//Se manda llamar las funciones que traen los datos en arreglos apra listarlos en los campos que requieren de la informacion que exista en otra tabla, son listados dinamicamente respecto al numero de campos que tengan en la tabla
$datosEquipo = $controlador -> obtenerDatosEquipos();

?>

<section class="content-header">
    <h1>
        Editar Equipos
        
    </h1>
        <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Equipos </a></li>
        <li class="active">Editar Equipo</li>
    </ol>
           
</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Edite los datos del equipo</h3>
            </div>

            <form role="form" method='post'>
                
                <div class="box-body">


                <div class="form-group">
                    <label for="matricula">Id del Deporte</label>
                    <input type="text" class="form-control" name="id" placeholder="Id" value=" <?= $datosEquipo[0][0] ?> " disabled/>
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre del equipo</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Escribe el nombre del nuevo equipo" value="<?= $datosEquipo[0][1] ?>" >
                </div>

                </div>
                    <div class="box-footer">
                    <center> <button type="submit" class="btn btn-primary">Guardar Datos</button> </center>
                </div>

            </form>

        </div>
    </div>
</div>

</section>

<?php

//Toda la informacion la cacha el metodo del controlador para editar los datos del usuario que se le paso como parametro GET el equipo
if(isset($_POST['nombre'])){
        
    $controlador -> editarDatosEquipo();

}

?>
