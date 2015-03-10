<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>CodePen - Flat UI Login</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body onLoad="showMessage(<?php echo $_GET['msg'] ?>)">

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><img id ="perfil_img"src=<?php echo $_SESSION['imagen_perfil'];?> alt="SWAG"/> <a href="perfil_admin.php">
      Welcome <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></a>
      | <a href="control_cerrar.php" id="loginform">Sign out</a></h2>
    
    </div>
  </div>
</div>
<section>
	<article id="forma">
	<h2 id="titulo">Resgister</h2>
		<form name="formDatos"method="post"action="Control_registros.php" class="details" enctype="multipart/form-data">
			<input type="text" placeholder="Name" id="nombre" name="nombre" required autocomplete="off"/>
			<input type="text" placeholder="Last Name" id="apellido" name="apellido" required autocomplete="off"/>
			<input type="email" placeholder="example@email.com" id="correo" name="correo" required autocomplete="off"/>
			<input type="text" placeholder="Username" id="usuario" name="usuario" required autocomplete="off"/>
			<input type="password" placeholder="Password" id="contrasena" name="contrasena" required/>
			<br><br>
			<select name="user_rol_id" id="nombre">
                <?php 
                include ('./util.php'); 
                $mysql=iniciarSesion();
				$qry="SELECT * FROM roles";
				$result=$mysql->query($qry);
				while($row= mysqli_fetch_array($result, MYSQLI_BOTH)){
				?>
                <option value="<?php echo $row['ID'] ?>"><?php echo $row['Descripcion'] ?></option>
                <?php	
				}
				cerrarSesion($mysql);
				?>
                </select><br>
			<h4 id="anuncio">Select profile picture
    		<input type="file" name="fileToUpload" id="fileToUpload" ></h4>
			<input type="submit" value="Sign Up" class="myButton">

	
		
		</form>	
	</article>

</section>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>


<script language="javascript">
	function showMessage(code_msg){
		if(code_msg==1){
			alert ("USUARIO AGREGADO");
			}
		if(code_msg==2){
			alert("Agrega información");
			}
		if(code_msg==3){
			alert("Campos No completos");
			}
		if(code_msg==4){
			alert("Correo Incorrecto");
			}


		}
</script>










