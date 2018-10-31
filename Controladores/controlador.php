<?php  
	class MvcController{
		//Función para mandar llamar a la plantilla para las vistas que se van a mostrar
		public function plantilla(){
			//Aquí es para redirigir a la plantilla para mostrar la vista
			header("location:Vistas/plantilla.php");
		}

		//Función para poder llamar a la vista que quiere ver el usuario
		public function enlacesPaginasController(){
			//Trabajar con los enlaces de las paginas
			//Validar si la variable "action" viene vacia, es decir, cuando se abre la pagina por primera vez, se debe cargar la vista index.php
			if (isset($_GET['action'])) {
				//Se consigue el action para poder ingresar a la vista
				$enlacesController = $_GET['action'];
			}else{
				//Si viene vacio inicializo con index
				$enlacesController = "index";
			}
			//Se crea un objeto de la clase EnlacesPaginas
			$respuesta = new EnlacesPaginas();

			//Aqui con la variable respuesta manda llamar la función del modelo que va hacer la tarea de mostrar la vista.
			include $respuesta->enlacesPaginasModel($enlacesController);
		}

		//Esta función sirve para ingresar con un usuario y contraseña para entrar a la pantalla principal(dashboard)
		public function login(){
			if(isset($_POST['usuario'])&&isset($_POST['contraseña'])){
				//Mediante variables mandar llamar a los campos de usuario y contraseña de la vista del login
				$usuario = $_POST['usuario'];
				$contraseña = $_POST['contraseña'];

				//Se crea un objeto de la clase Datos
				$log = new Datos();
				//Aqui se manda la información que se ir a la función de Iniciar_Sesión para que haga la consulta correspondiente

				$r = $log->loginModel($usuario,$contraseña);

				//Esta condición es para mandar la respuesta si es verdadero que inicie la sesión o si no mandar una alerta de error para que ingrese bien los datos
				if($r){
					//Las variables para poder iniciar la sesión mediante el nombre, el password, la imagen y el id
					$_SESSION['usuario'] = $r['nombre'];
					$_SESSION['contraseña'] = $r['contrasena'];
					$_SESSION['id'] = $r['id'];
					//Redirige a la plantilla y para que muestra el dashboard
					header("location:plantilla.php");
				}else{
					//Sino se manda una alerta indicando usuario o contraseña incorrecta
					echo "<script>alert('Usuario o contraseña incorrecta.')</script>";
				}
			}
		}

		//Función para obtener todos los registros de una tabla
		public function getAllController($tabla){
			//Instancia del modelo datos
			$datos = new Datos();

			//Retornar los datos de la tabla
			return $datos->getAllModel($tabla);
		}

		//metodo para obtener los equipos de un deporte
		public function getTeamsController($deporte){
			//instancia del modelo datos
			$datos = new Datos();
			//retornar los datos
			return $datos->getTeamsModel($deporte);
		}

		//metodo para registrar un nuevo jugador
		public function registrarJugador($deporte,$equipo){
			//se guardan en variables los campos del formulario para registrar enviados por el metodo post
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			//modelo datos
			$datos = new Datos();

			//condiciacion para verificar si ese usuario que se intenta registrar no existe registrado en el mismo deporte
			if($datos->verificarJugador($email,$deporte)==false){
				//se procede a realizar el registro
				//condicion para saber si el registro fue exitoso
				if($datos->registrarJugadorModel($nombre,$email,$deporte,$equipo)==true){
					return true;
				}else{
					//alerta avisando que no se ha podido realizar el registro del jugador
					echo "<script>alert('No se ha podido registrar un jugador')</script>";
					return false;
				}
			}else{
				//notificar que el jugador ya se encuentra registrado en ese deporte
				echo "<script>alert('El jugador que intenta registrar ya se encuentra en un equipo de este deporte.')</script>";
			}
		}

		//metodo para eliminar un jugador
		public function eliminarJugadorController($id){
			$datos = new Datos();
			//se guarda la contraseña que se pide antes de eliminar
			$contraseña = $_POST['contraseña'];

			//si la contraseña coincide se procede a eliminar el jugador
			if($_SESSION['contraseña']==$contraseña){
				if($datos->eliminarJugadorModel($id)==true){
					return true;
				} else{
					//si no se pudo realizar la eliminacion se manda la siguiente alerta
					echo "<script>alert('No se ha podido eliminar el jugador.')</script>";
					return false;
				}
			}else{
				//alerta para cuando la contraseña no coincide con la del usuario en sesion
				echo "<script>alert('Contraseña incorrecta. Vuelve a intentarlo.')</script>";
			}
			
		}

		//metodo para obtener la informacion de un jugador
		public function getInfoJugador($id){
			//instancia del modelo datos
			$datos = new Datos();
			return $datos->getJugadorModel($id);
		}

		//metodo para actualizar un jugador
		//se recibe como parametro el deporte, equipo, y id del jugador a actualizar
		public function updateJugador($deporte,$equipo,$id){
			//instancia del modelo datos
			$datos = new Datos();
			//condicion para verificar si la actualizacion fue exitosa
			//se manda ademas de los parametros del metodo, el nombre del jugador
			if($datos->updateJugadorModel($_POST['nombre'],$deporte,$equipo,$id)==true){
				return true;
			}else{
				//alerta para cuando no se logro actualizar el jugador
				echo "<script>alert('No se ha podido actualizar el jugador. Vuelve a intentarlo.')</script>";	
				return false;
			}
		}

		//////////
		public function agregarDeporte(){
        	if(isset($_POST['nombre'])){
            	$nombre_deporte=$_POST['nombre'];
            	$datos=array('nombre_deporte'=>$nombre_deporte);
            	$r = new Datos();
	        	$respuesta = $r->agregarDeporteModel($datos, 'deporte');
            	if ($respuesta) {
            		echo "<script>alert('Deporte agregado correcatamente')</script>";
            	}else{
            		echo "<script>alert('Deporte no agregado')</script>";
            	}
        	}
		}

		public function obtenerDatosDeportes()
    	{

        $datosDeCarreras = array();
        
        //Manda llamar el metodo desde el modelo y pasandole la tabla de donde se van a extraer los datos como parametro
        $r = new Datos();
        $datosDeCarreras = $r->traerDatosDeportes("deporte");

        return $datosDeCarreras;
    	}

    	public function obtenerDatosDeporteId(){
        $deporte_id = $_GET['id'];

        $datosDeDeportes = array();
        
        //Se manda llamar el metodo del modelo pasandole como parametro la matricula del deporte a traer los datos, de igual forma se hace una union de tablas para obtener la informacion mas entendible, por ello no se pasa el nombre de la tabla como parametro
        $r = new Datos();
        $datosDeDeportes = $r->obtenerDatosDeDeporteId($deporte_id);

        return $datosDeDeportes;
    }

    public function editarDatosDeporte(){

        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        
        

        //Se finaliza de crear los datos, ya con la  foto nueva o en caso de que haya elegido una nueva
        $datosDeporte = array('id' => $id,
                            'nombre' => $nombre);
        
        //Se manda ese objeto con los datos al modelo para que los almacenen en la tabla pasada por parametro aqui abajo
        $r = new Datos();
        $respuesta = $r->editarDeporte($datosDeporte, "deporte");
        
        //El metodo responde con un success o un error y se realiza las notificaciones pertinentes al usuario
        if($respuesta=="success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "?action=listaDeporte"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    public function eliminarDeporte(){

        $id = $_GET['id'];
        
        $r = new Datos();
        $respuesta = $r->eliminarDatosDeporte($id, "deporte");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los usuarios
        if($respuesta == "success"){
            echo '<script> 
                    alert("Deporte eliminado");
                    window.location.href = "?action=listaDeporte";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar") </script>';
        }

    }

    public function guardarDatosEquipo(){
        	
        $nombre=$_POST['nombre'];
        $deporte = $_POST['deporte'];
        $datosEquipo=array('nombre'=>$nombre,
    				'deporte'=>$deporte);
        $r = new Datos();
        $respuesta = $r->guardarEquipo($datosEquipo, "equipo");
        if ($respuesta== "success") {
            echo "<script>alert('Equipo agregado correcatamente')</script>";
        }else{
            echo "<script>alert('Equipo no agregado')</script>";
        }
        	
	}

	public function obtenerDatosEquipos()
    {
        $datosDeEquipos = array();
        
        //Esta funcion del modelo no pide la tabla ya que se trata de una union de todas las tres tablas existentes para traer todos los datos completos y entendibles
        $r = new Datos();
        $datosDeEquipos = $r->traerDatosEquipos();

        return $datosDeEquipos;
    }

    public function editarDatosEquipo(){
    	$id = $_GET['id'];
        $nombre = $_POST['nombre'];

        $datosEquipo = array('id' => $id,
                            'nombre' => $nombre);

    	$r = new Datos();
    	$respuesta = $r->editarEquipo($datosEquipo, "equipo");

    	if($respuesta == "success"){
            
            echo '<script> 
                    alert("Datos guardados correctamente");
                    window.location.href = "?action=listaEquipo"; 
                  </script>';
            
        }else{
            echo '<script> alert("Error al guardar") </script>';
        }

    }

    public function eliminarEquipo(){

        $idEquipo = $_GET['id'];
        
        $r = new Datos();
        $respuesta = $r->eliminarDatosEquipo($idEquipo, "equipo");

        //Se notifca al usuario como se realizo en los metodos pasados y si se borro exitosamente lo redirecciona a la pagina principal en donde estan listados todos los equipos
        if($respuesta == "success"){
            echo '<script> 
                    alert("Equipo eliminado");
                    window.location.href = "?action=listaEquipo";
                  </script>';
        }else{
            echo '<script> alert("Error al eliminar el quipo") </script>';
        }

    }
	}
?>