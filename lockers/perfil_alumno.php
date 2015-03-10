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

<body >

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><img id ="perfil_img"src=<?php echo $_SESSION['imagen_perfil'];?> alt="SWAG"/> <a href="perfil_alumno.php">
      Welcome <?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></a>
      | <a href="control_cerrar.php" id="loginform">Sign out</a></h2>
    
    </div>
  </div>
</div>
<section>
	<article id="forma">
		
	</article>


</section>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>


