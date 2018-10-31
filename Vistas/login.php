<?php  
    //Iniciar la sesión del usuario 
    session_start();
    //Requiere los controlodores y modelos para poder hacer el llamado de una consulta o vista
    require_once "../Controladores/controlador.php";
    require_once "../Modelos/enlaces.php";
    require_once "../Modelos/crud.php";
    //Condición si el usuario inicio sesión
    if(isset($_SESSION['usuario'])){
        //Si la inicio se inicio con el usuario redirige a la plantilla
        header("location:plantilla.php");
    }
    //Condición para llamar los parametros del formulario
    if($_POST){
        //Inicia una instancia del controlador
        $log = new MvcController();
        //Llama a la función de Login de la instacia
        $log->login(); 
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sistema de Tutorias</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../estilo/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../estilo/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../estilo/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="../estilo/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../estilo/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="../estilo/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="../estilo/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="../estilo/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../estilo/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../estilo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue login-page">
  	<div class="login-box">
	    <div class="login-logo">
	      Iniciar Sesion
	    </div>
	    <div class="login-box-body">
	        <center><img src="../media/system/user2.png" height="180" width="180"></center>
	            <br>

	    <form method="post">
	      <div class="form-group has-feedback">
	        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" required>
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      </div>
	      <center><input type="submit" value="Ingresar" class="btn btn-primary btn-flat btn-block"></center>
	    </form>
	  
	    </div>
  	</div>
</body>
<script src="../estilo/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../estilo/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../estilo/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../estilo/bower_components/raphael/raphael.min.js"></script>
<script src="../estilo/bower_components/morris.js/morris.min.js"></script>
<script src="../estilo/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../estilo/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../estilo/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../estilo/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="../estilo/bower_components/moment/min/moment.min.js"></script>
<script src="../estilo/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../estilo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../estilo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../estilo/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../estilo/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../estilo/dist/js/adminlte.min.js"></script>
<script src="../estilo/dist/js/pages/dashboard.js"></script>
<script src="../estilo/dist/js/demo.js"></script>
</html>