<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registro de Usuarios</title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	<link type="text/css" rel="Stylesheet" href="css/jquery.validity.css" />
	
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.validity.js"></script>
	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
	
	<script type="text/javascript">/*
	tinyMCE.init({
		mode : "textareas",
		theme_toolbar_location : "top"
	});*/
	$(function() { 
                $("form").validity(function() {
                    $("#nombre")
                        .require("Es necesario tu nombre para seguir.")
                    $("#apellido")
                        .require("Es necesario tu apellido para seguir.")
					$("#username")
                        .require("Es necesario tu nombre de usuario para seguir.")
						.match(/^.{5,10}$/, "El nombre de usuario debe tener entre 5 y 10 caracteres.")
					$("#email")
                        .require("Es necesario tu e-mail para seguir.")
						.match("email","Debe ser un e-mail válido");
					// Validar password fuerza y coincidencia
					$("input[type='password']")
						.require("Este campo es necesario para seguir.")
						.match(/^.{5,10}$/, "La contraseña debe tener entre 5 y 10 caracteres.")
						.equal("Las contraseñas no coinciden.");
				});
            });
	</script>


</head>
<body>

<div class="formulario">
<img src="images/logo.png" alt="Login Terrazzo Mensajes" title="Login Terrazzo Mensajes" />
	<form action="includes/agregarUsuario.php" method="POST">
		<p>
			<label for="nombre">Nombre: </label>
			<input type="text" name="nombre" id="nombre"/>
		</p>
		
		<p>
			<label for="apellido">Apellido: </label>
			<input type="text" name="apellido" id="apellido"/>
		</p>
		
		<p>
			<label for="email">E-Mail: </label>
			<input type="text" name="email" id="email"/>
		</p>
		
		<p>
			<label for="username">Nombre de usuario</label>
			<input type="text" name="username" id="username"/>
		</p>
		
		<p>
			<label for="pass">Contraseña: </label>
			<input type="password" name="pass" id="pass"/>
		</p>
		
		<p>
			<label for="repass">Repetir Contraseña: </label>
			<input type="password" name="repass" id="repass"/>
		</p>
		
		<p>
			<input type="submit" value="Registrar" name="registrar" />
		</p>
		
		<a href="index.php">¿Ya tiene cuenta? Login</a>
	</form>
<?php 
if (isset($_SESSION['error'])) {
	echo '<div class="error">';
	echo $_SESSION['error'];
	session_unset();
	session_destroy();
	echo '</div><!-- Fin: .error -->';
}
?>
</div><!-- Fin: .formulario -->

</body>
</html>