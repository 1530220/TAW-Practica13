<?php  
	//Iniciar la sesión del usuario  
	session_start();
	//Requiere los controlodores y modelos para poder hacer el llamado de una consulta o vista
	require_once "Controladores/controlador.php";
	require_once "Modelos/enlaces.php";
	require_once "Modelos/crud.php";
	//Condicion donde el usaurio inicio sesión o no
	if(isset($_SESSION['usuario'])){
		//Si los datos estan corrrectos
		//Una instancia del controlador
		$plantilla = new MvcController();
		//Llama a la función plantilla
		$plantilla->plantilla();
	}else{
		//Si los datos no estan correctos te devuelve al login
		header("location:Vistas/login.php");
	}
?>