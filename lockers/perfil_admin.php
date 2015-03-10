<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
      | <a href="control_cerrar.php" id="loginform">Sign out</a> | <a href="registro.php">Register</a></h2>
    
    </div>
  </div>
</div>
<section>
	<article id="forma">
		<h2 id="titulo">Usuarios</h2>
		<p>
		<?php 
                if (!function_exists('iniciarSesion'))
                {
                	include ('./util.php');
                }                    
                $mysql=iniciarSesion();
				$qry="SELECT * FROM usuarios";
				$result=$mysql->query($qry);
				while($row= mysqli_fetch_array($result, MYSQLI_BOTH)){
				?>
                <strong>Nombre: </strong><?php echo $row['Nombre'] ?> <strong>Apellido:</strong> <?php echo $row['Apellido'] ?> <strong>Correo:</strong> <?php echo $row['Correo']?><br>
                <?php	
				}
				cerrarSesion($mysql);
				?>
		</p>

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
			alert("No se pudo conectar a la base de datos.");
			}

		}
</script>

