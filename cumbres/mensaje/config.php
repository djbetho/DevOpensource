<?php
# Sistema de mensajeria privada By marcofbb.com.ar

$dbhost = "localhost"; // Servidor
$dbuser = "root"; // Nombre de Usuario
$dbbase = "cumbres"; // Nombre de la base de datos
$dbpass = ""; // Contraseña

# Conectamos a la base de datos
$link = mysql_connect($dbhost,$dbuser,$dbpass);
		mysql_select_db($dbbase,$link);
?>
