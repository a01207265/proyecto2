<?php
// Start the session
if (session_status() != PHP_SESSION_NONE) {
    session_start();

session_unset(); 

// destroy the session 
session_destroy(); 

}
?>
<!DOCTYPE html>
<html>

<head>

  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

  <title>CodePen - Flat UI Login</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body onLoad="showMessage(<?php echo $_GET['msg'] ?>)">

  <div id="wrap">
  <div id="regbar">
    <div id="navthing">
      <h2><a href="#" id="loginform">Login</a></h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">
           <fieldset>
            <form name="login" action="control_login.php" method="post">
	             <label >Usuario</label>
	             <input type="text" placeholder="YoloSwag123" name="username" />
	             <label>Password</label>
	             <input type="password" name="password" />
	             <input type="submit" value="Sign In"  />
             </form>


           </fieldset>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<section>
	<article id="forma">
		<h2 id="titulo">Preguntas</h2>
		<ul>
			<li>¿Por qué es una buena práctica separar el modelo del controlador?. <br>
			- Ayuda a mantener la aplicación de una forma más fácil ya que están separados.<br>
			</li>
			<li>¿Qué es ODBC y para qué es útil?<br>
			- ODBC(Open Database Conection) Se usa para interactuar con la aplicación de bases 
			de datos da que perimete la comunicación para interacuar</li>
			<li>¿Qué técnicas puedes utilizar para evitar ataques de SQL Injection?<br>
			- Usar sólo texto para que el usuario no pueda introduir punto y coma entre otros caracteres
			que puedan comprometer la base.<br>
			- Validar que no se introduscan símpolos no deseados <br>
			- Es mejor usar POST que GET para que el usuario no pueda introducir comandos no deseados.</li>
			
		</ul>
		<h2 id="titulo">AVISOS</h2>
		<p> - Para registrar personas se debe entrar como Administrador</p>
		<p>Entrar como administrador: Usuario: A01200000 Contraseña: abcdef</p>
		
	</article>

</section>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>

<script language="javascript">
	function showMessage(code_msg){
		if(code_msg==1){
			alert ("No existe el usuario");
			}
		if(code_msg==2){
			alert("Fill out Sign in");
			}
		if(code_msg==3){
			alert("No se pudo conectar a la base de datos.");
			}

		}
</script>


