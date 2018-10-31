<?php  
	//Clase conexion que tiene el pdo a utilizar
	class Conexion{
		public function conectar(){
			//Crear una instancia de PDO para realizar la conexión
			//host: localhost
			//dbname : nombre de la base de datos
			$pdo = new PDO("mysql:host=localhost;dbname=practica13","root","");
			//Se retorna el PDO
			return $pdo;
		}
	}
?>