<?php
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
	header("Location: mensajes.php");
} else {
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Mensajería Interna</title>

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
                    $("#username")
                        .require("Es necesario tu nombre de usuario para seguir.")
                    
                    $("#password")
                        .require("Es necesaria tu contraseña para seguir.")
                });
            });
	</script>


</head>
<body>

<div class="formulario">
<img src="images/logo.png" alt="Login Terrazzo Mensajes" title="Login Terrazzo Mensajes" />
<form action="login.php" method="POST">
	<p>
		<label for="username">Usuario: </label>
		<input type="text" name="username" id="username" />
	</p>
	
	<p>
		<label for="password">Contraseña: </label>
		<input type="password" name="password" id="password" />
	</p>
	
	<input class="submit" type="submit" name="loginForm" value="Entrar" />
	<a href="registrar.php">Registrar Usuario</a>
	<div class="clear"></div>
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

<?php
}
?>