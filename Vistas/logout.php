<?php  
	//Iniciar la sesión del usuario 
	session_start();
	//Una condición para saber si el usuario esta logeado o no
	if(isset($_SESSION['usuario'])){
		//Se termina la sesión
		session_destroy();
		//Y se redirige a login
		header("location:login.php");
	}
?>