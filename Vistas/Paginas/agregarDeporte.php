<?php
    $controlador= new MvcController();

    $controlador -> agregarDeporte();
?>
<section class="content-header">
    <h1>
        Agregar Deporte
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Deportes </a></li>
        <li class="active">Agregar Deporte</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos del deporte</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST">
                
                <div class="box-body">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del deporte">
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
