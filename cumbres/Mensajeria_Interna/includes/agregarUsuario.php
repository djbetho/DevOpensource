<?php

require 'conexion.php';
$db = new Db();

// Agrega un nuevo mensaje

if(isset($_POST['registrar'])) {
	$query = "INSERT INTO usuarios VALUES('',?,?,?,?,?)";
	/*
	id nombre apellido username password
	*/
	if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['repass']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && strlen($_POST['username']) > 0 && strlen($_POST['pass']) > 0 && strlen($_POST['nombre']) > 0 && strlen($_POST['apellido']) > 0 && strlen($_POST['email']) > 0) {
		
		if ($_POST['pass'] == $_POST['repass']) {
			$nombre = htmlspecialchars(strip_tags($_POST['nombre']));
			$apellido = htmlspecialchars(strip_tags($_POST['apellido']));
			$email = htmlspecialchars($_POST['email']);
		    $username = strip_tags($_POST['username']);
			$pass = strip_tags($_POST['pass']);
			
			$validar_email = '/^[A-Z0-9._%\-+]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i';
			if (!preg_match($validar_email, $email)) {
				$_SESSION['error'] = 'Su email no es valido!';
				header("Location: registrar.php");
			}
			
			if($stmt = $db->mysql->prepare($query));
			$stmt->bind_param('sssss', $nombre, $apellido, $email, $username, md5($pass));
			$stmt->execute();
			header('location: ../index.php');
		} else {
			$_SESSION['error'] = "Contraseña y repetir contraseña deben coincidir!!!";
			header("Location: registrar.php");
		}
	} else {
		$_SESSION['error'] = "Complete todos los campos por favor!!";
		header("Location: registrar.php");
		echo "Complete todos los campos por favor!!";
	}
} else die($db->mysql->error);
