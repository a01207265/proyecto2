
<script language="php">


	function iniciarSesion(){

	$mysqli = new mysqli("localhost","root","passwordroot","lockers");
	return $mysqli;

	}	


	function cerrarSesion($mysql){

	mysqli_close($mysql);

	}

	function insertar($cant){

		$mysql=iniciarSesion();


				$query='INSERT INTO usuarios (Matricula, Nombre, Apellido, Correo, Contrasena, imagen, ID_Role) VALUES (?,?,?,?,?,?,?)';
		// Preparing the statement 
		if (!($statement = $mysql->prepare($query))) {
		    die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
		}
		// Binding statement params 
		   
		if (!$statement->bind_param("sssssss", $cant[4],$cant[1],$cant[2],$cant[3],$cant[5],$cant[7],$cant[6])) {
		    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
		}

		 // Executing the statement
		 if (!$statement->execute()) {
		    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
		  } 


		  cerrarSesion($mysql);

		    
		             

	}

		

	

</script>