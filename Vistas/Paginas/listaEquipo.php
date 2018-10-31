<?php

//Lista de todos los alumnos registrados en la tabla alumnos

//Se crea un objeto de tipo controlador para poder llamar los metodos para traer toda la informacion
$controlador = new MvcController();

//Se crea un array que va a recibir todos los obejtos 
$datosEquipos = array();

//Y se llena ese array con la respuesta con los datos
$datosEquipos = $controlador -> obtenerDatosEquipos();

?>

<section class="content-header">
    <h1>
        Equipos
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Equipos </a></li>
        <li class="active"> Lista de Equipos </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <!--<h3 class="box-title">Data Table With Full Features</h3> -->
        <a href="?action=agregarEquipo" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar nuevo equipo </a>
        <hr>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Deporte</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0; $i < count($datosEquipos); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosEquipos[$i]['id'] .'</td>';
                            echo '<td>'. $datosEquipos[$i]['nombre'] .'</td>';
                            echo '<td>'. $datosEquipos[$i]['deporte'] .'</td>';


                            echo '<td> <a href="?action=editarEquipo&id='.$datosEquipos[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fa fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="?action=listaEquipo&accion=eliminarEquipo&id='.$datosEquipos[$i]['id'].'" type="button"  class="btn btn-danger"> <i class="fa fa-trash"></i>  </a> </td>';
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
</section>

<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminarEquipo"){
        $controlador -> eliminarEquipo();
    }
}

?>