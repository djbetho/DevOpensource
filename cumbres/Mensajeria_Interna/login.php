<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0) {
	$user = strip_tags($_POST['username']);
	$pass = strip_tags($_POST['password']);
	
    require 'includes/conexion.php';
	$db = new Db();
	$query = "SELECT * FROM usuario WHERE usuario='".$user."' AND password ='".($pass)."'";
	$results = $db->mysql->query($query);
	$encontrados = $results->num_rows;
	$row = $results->fetch_object();
	$nombre = $row->nombre;
	$apellido = $row->apellido;
	
	if ($encontrados>0) {
		$_SESSION['logged'] = 1;
		$_SESSION['username'] = $user;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['apellido'] = $apellido;
		header("Location: index.php");
	} else {
		$_SESSION['error'] = "Error en el nombre de usuario o en la contraseña. Intente nuevamente.";
		header("Location: index.php");
	}
} else {
	$_SESSION['error'] = "Por favor ingrese los datos de logueo.";
	header("Location: index.php");
}

?>

