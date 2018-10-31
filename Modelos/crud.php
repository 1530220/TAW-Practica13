<?php  
	require_once "conexion.php";

	class Datos extends Conexion{
		//Metodo para verificar si el usuario que desea iniciar sesion  esta registrado
		public function loginModel($usuario,$contraseña){
			//Consulta para seleccionar la tabla usuarios
			$sql = "SELECT * FROM usuarios WHERE nombre = ? and contrasena = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se ejecuta la consulta
			$stmt->execute(array($usuario,$contraseña));
			$r = $stmt->fetch();
			//Una condicion para que devuelva la respuesta o un array vacio
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//Metodo para obtener toda la informacion de una tabla
		public function getAllModel($tabla){
			//Consulta para seleccionar la tabla
			$sql = "SELECT * FROM $tabla";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta
			$stmt->execute();
			//Se asocian los registros a $r
			$r = $stmt->fetchAll();
			//Una condicion para que devuelva la respuesta o un array vacio
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para consultar todos los equipos que pertenescan a un deportee
		public function getTeamsModel($deporte){
			//consulta
			$sql = "SELECT * FROM equipo WHERE deporte = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta, parametro: el deporte
			$stmt->execute(array($deporte));
			//Se asocian los registros a $r
			$r = $stmt->fetchAll();
			//Una condicion para que devuelva la respuesta o un array vacio
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para verificar que el jugador no exista en el deporte
		public function verificarJugador($email,$deporte){
			$sql = "SELECT * FROM jugador WHERE email = ? and deporte = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta
			$stmt->execute(array($email,$deporte));
			//Se asocian los registros a $r
			$r = $stmt->fetchAll();
			//Una condicion para que devuelva la respuesta o un array vacio
			if($r){
				return true;
			}else{
				return false;
			}	
		}

		//metodo para registrar el nuevo jugador
		public function registrarJugadorModel($nombre,$correo,$deporte,$equipo){
			$sql = "INSERT INTO jugador (nombre,email,equipo,deporte) VALUES (?,?,?,?)";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta	
			if($stmt->execute(array($nombre,$correo,$equipo,$deporte))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para eliminar un jugador, parametro: id del jugador a eliminar
		public function eliminarJugadorModel($id){
			$sql = "DELETE FROM jugador WHERE id = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta	
			if($stmt->execute(array($id))){
				return true;
			}else{
				return false;
			}
		}

		//metodo para obtener la informacion del jugador
		public function getJugadorModel($id){
			$sql = "SELECT * FROM jugador WHERE id = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta
			$stmt->execute(array($id));
			//Se asocian los registros a $r
			$r = $stmt->fetch();
			//Una condicion para que devuelva la respuesta o un array vacio
			if($r){
				return $r;
			}else{
				return [];
			}
		}

		//metodo para actualizar datos de un jugador
		//parametros: nombre, deporte,equipo, id del jugador
		public function updateJugadorModel($nombre,$deporte,$equipo,$id){
			$sql = "UPDATE jugador SET nombre = ?, deporte = ? , equipo = ? WHERE id = ?";
			//Se prepara la consulta
			$stmt = Conexion::conectar()->prepare($sql);
			//Se executa la consulta	
			if($stmt->execute(array($nombre,$deporte,$equipo,$id))){
				return true;
			}else{
				return false;
			}
		}

		//////


		public function agregarDeporteModel($datos,$tabla){
			//Llama la conexión y hace la inserción de los datos y cada stmt para llenar los datos a la tabla deporte
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre) ");
			$stmt->bindParam(":nombre", $datos["nombre_deporte"] , PDO::PARAM_STR);
			return $stmt->execute();
		}

		public function traerDatosDeportes($tabla){

        //Conexion::conectar() -> es igual a un objeto PDO el cual sirve para conectarse a la base de datos
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        //Metodo que ejecuta el query previamente preparado
        $stmt->execute();

        //Se crea un objeto tipo array para recibir los datos
        $r = array();
        //se traen todos los datos con la funcion fetchAll
        $r = $stmt->FetchAll();
        
        //Se retornan los datos para el modelo
        return $r;
    
	    }

	    public function obtenerDatosDeDeporteId($deporte_id){

	        //Se prepara el query
	       $stmt = Conexion::conectar()->prepare("SELECT * FROM deporte WHERE id = :deporte_id");

	        //Se pasan los parametros de ese query
	        $stmt->bindParam(":deporte_id", $deporte_id , PDO::PARAM_STR);

	        //se ejecuta
	        $stmt->execute();

	        $r = array();

	        //Se trane todos los ddatos
	        $r = $stmt->FetchAll();
	        
	        //y finalmente se pasan al controlador para ponerlos en la vista en donde se hace la edicion de dicho registro
	        return $r;

	    }
	    public function editarDeporte($datosDeporte, $tabla){

	        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
	        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
	                                               SET nombre = :nombre
	                                               WHERE id = :id ");
	        
	        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
	        $stmt->bindParam(":nombre", $datosDeporte["nombre"], PDO::PARAM_STR);
	        $stmt->bindParam(":id", $datosDeporte["id"] , PDO::PARAM_INT);

	        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
	        if($stmt->execute()){
	            return "success";
	        }else{
	            return "error";
	        }

	        $stmt->close();


	    }

		public function eliminarDatosDeporte($deporte_id, $tabla){

	        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");

	        $stmt->bindParam(":id", $deporte_id , PDO::PARAM_INT);

	        //Le informa al controlador si se realizao con exito o no dicha transaccion
	        if($stmt->execute() ){
	            return "success";
	        }else{
	            return "error";
	        }

	    }

	    //Funcion que almacena todos los datos de un alumno en su respectiva tabla, tabmien pasada por parametro (el nombre del equipo)
	    public function guardarEquipo($datosEquipo, $tabla){

	        //Se prepara el query con el comando INSERT -> DE INSERTAR 
	        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, deporte) VALUES(:nombre, :id) ");
	        
	        //Se colocan todos sus parametros especificados, y se relacionan con los datos pasdaos por parametro a esta funcion desde el controladro en modo de array asociativo
	        $stmt->bindParam(":nombre", $datosEquipo["nombre"], PDO::PARAM_STR);
	        $stmt->bindParam(":id", $datosEquipo["deporte"], PDO::PARAM_INT);
	        if($stmt->execute()){
	            return "success";
	        }else{
	            return "error";
	        }

	    }  

	    public function traerDatosEquipos(){

	        $stmt = Conexion::conectar()->prepare("SELECT t1.id as id, t1.nombre as nombre, t2.nombre as deporte FROM equipo as t1 INNER JOIN deporte AS t2 ON t2.id = t1.deporte");

	        $stmt->execute();

	        $r = array();

	        //Se guardan todos los datos en el arreglo antes creado
	        $r = $stmt->FetchAll();
	        
	        
	        return $r;

	    }  


	    public function editarEquipo($datosEquipo, $tabla){

	        //Se prepara el query con el comando UPDATE -> DE EDITAR, O ACTUALIZAR
	        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
	                                               SET nombre = :nombre
	                                               WHERE id = :id ");
	        
	        //Se relacionan todos los parametros con los pasados en el arreglo asociativo desde el controlador
	        $stmt->bindParam(":nombre", $datosEquipo["nombre"], PDO::PARAM_STR);
	        $stmt->bindParam(":id", $datosEquipo["id"] , PDO::PARAM_INT);
	        

	        //Y son ejecutados y notificados al controlador para que este les notifique a las vistas para que den un mensaje amigable al usuario
	        if($stmt->execute()){
	            return "success";
	        }else{
	            return "error";
	        }

	        $stmt->close();


	    }


	    public function eliminarDatosEquipo($id, $tabla){

	        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");

	        $stmt->bindParam(":id", $id , PDO::PARAM_INT);

	        //Le informa al controlador si se realizao con exito o no dicha transaccion
	        if($stmt->execute() ){
	            return "success";
	        }else{
	            return "error";
	        }

	    }
	}
?>