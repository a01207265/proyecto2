
<script language="php">


	function iniciarSesion(){

	$mysql = mysqli_connect("localhost","root","passwordroot","lockers");
	return $mysql;

	}	


	function cerrarSesion($mysql){

	mysqli_close($mysql);

	}

	function insertar($nom1,$password){

		$mysql=iniciarSesion();


				$query='INSERT INTO cuentas (Correo,Password) VALUES (?,?)';
		// Preparing the statement 
		if (!($statement = $mysql->prepare($query))) {
		    die("Preparation failed: (" . $mysql->errno . ") " . $mysql->error);
		}
		// Binding statement params 
		   
		if (!$statement->bind_param("ss", $nom1, $password)) {
		    die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
		}

		 // Executing the statement
		 if (!$statement->execute()) {
		    die("Execution failed: (" . $statement->errno . ") " . $statement->error);
		  } 


		  cerrarSesion($mysql);

		    
		             

	}

	function recupera($correo){

		$mysql=iniciarSesion();

		  $query="SELECT COUNT(1) FROM cuentas WHERE correo='$correo'";
		 // Query execution; returns identifier of the result group
		   $results = $mysql->query($query);
		    
		    while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
		    // use of numeric index
		    return $row[0]; 
		   
		  
		    }
		  mysqli_free_result($results);
		
	
		  cerrarSesion($mysql);
	}
	

	

</script>