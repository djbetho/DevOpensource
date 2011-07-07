<?php


require 'conexion.php';
$db = new Db();

// Agrega un nuevo mensaje

if(isset($_POST['enviarMensaje'])) {
	$query = "INSERT INTO mensajes VALUES('', ?, ?, ?, ?, ?)";
	/*
	id 	autor 	ip 	dia 	mes 	anio 	hora 	mensaje 
	*/
	
	if($stmt = $db->mysql->prepare($query));
	$stmt->bind_param('sssss', htmlspecialchars(strip_tags($_POST['autor'])),getenv('REMOTE_ADDR'),date('Y-m-d'),date('G:i:s'),htmlspecialchars(strip_tags($_POST['campo_mensaje'])));
	$stmt->execute();
	header('location: ../index.php');
   
} else die($db->mysql->error);
