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
                    $("#autor")
                        .require()
                    
                    $("#campo_mensaje")
                        .require()
                });
				var refresh = setInterval(
				function() {
					$('#main').load('leerMsj.php');
				}, 15000);
            });
	</script>


</head>
<body>
	<div id="contenedor">
		
		<div id="cabecera">
			<h1 class="logo"><a href="index.php" title="Mensajes Interna">Mensajería Interna - HOME</a></h1>
			
			<ul class="nav">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="antiguos.php">Mensajes antiguos</a></li>
				<li><a href="logout.php">LogOut</a></li>
			</ul>
			
			<div class="clear"></div>
		</div>