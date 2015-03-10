<?php 
if(session_id()==''){
	session_start();
	}

include ('./util.php'); 
if (isSet($_POST['username']) && isSet($_POST['password'])){
	$username=$_POST["username"];
	$password=$_POST["password"];
	//echo "username: ".$username." Password: ".$password;
	$mysql=iniciarSesion();
	
		$query="select * from usuarios where Matricula='".$username."' and Contrasena ='".$password."'";
		$results= $mysql->query($query);
		
		$row = $results->fetch_array(MYSQLI_BOTH);
		//echo 'row: '.$row['ID_Role']; 
 		if($row[0] != ""){
			$_SESSION['nombre']=$row['Nombre'];
			$_SESSION['apellido']=$row['Apellido'];
			$_SESSION['rol']=$row['ID_Role'];
			$_SESSION['user_id']=$row['Matricula'];
			$_SESSION['imagen_perfil']=$row['imagen'];
			mysqli_free_result($results);

			if($_SESSION['rol']==0){
				include ('./perfil_admin.php');
			}else if($row['ID_Role']==1){
				include ('./perfil_alumno.php');
				}
		}else{
			header('location:login.php?msg=1');
		}
}else{
	header('location:perfil_admin.php?msg=2');
}	
		
			
?>
