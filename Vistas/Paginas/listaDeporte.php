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
        Deportes
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Deporte </a></li>
        <li class="active"> Lista de Deportes </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">

    <div class="box-header">
        <a href="?action=agregarDeporte" class="btn btn-primary " > <i class="fas fa-plus-square"></i> Agregar Deporte </a>
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
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosDeporte); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosDeporte[$i]['id'] .'</td>';
                            echo '<td>'. $datosDeporte[$i]['nombre'] .'</td>';
                            //Estos dos de abajo son los botones, se puede observar que estan listos para redirigir el flujo de la app a una pagina que se ellama editar y eliminar, teniendo un parametro el cual es la matricula del alumno a administrar

                            echo '<td> <a href="?action=editarDeporte&id='.$datosDeporte[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fa fa-edit"></i> </a> </td>';
                            
                            echo '<td>  <a href="?action=listaDeporte&accion=eliminarDeporte&id='.$datosDeporte[$i]['id'].'" type="button"  class="btn btn-danger"> <i class="fa fa-trash"></i>  </a> </td>';
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
    if( $_GET['accion'] == "eliminarDeporte"){
        $controlador -> eliminarDeporte();
    }
}

?>