<?php 
    //Iniciar la sesión del usuario 
    session_start();
    //Requiere los controlodores y modelos para poder hacer el llamado de una consulta o vista
    require_once "../Controladores/controlador.php";
    require_once "../Modelos/enlaces.php";
    require_once "../Modelos/crud.php";
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
  <link rel="stylesheet" href="../estilo/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../estilo/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../estilo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>UPV</b></span>
      <span class="logo-lg"><b>Control de Deportes</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="../media/system/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['usuario']?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="../media/system/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['usuario']?>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>


<?php 
	include "Paginas/navegacion.php";
?>

<div class="content-wrapper">
	
	<?php  
		$controlador_enlaces = new MvcController();
		$controlador_enlaces->enlacesPaginasController();
	?>
 <br><br>
</div>


  


  <footer class="main-footer">

    <div class="pull-right hidden-xs">
    UPV <br>Tecnologias y aplicaciones web
    </div>

    <strong>Copyright &copy; 2018.</strong>
    <br>Miguel Angel Perez Sanchez
    <br>Rodrigo Rojas Huerta
  </footer>



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
<script src="../estilo/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../estilo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../estilo/dist/js/demo.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</html>

