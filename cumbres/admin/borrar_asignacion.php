<?php
	$id_mensaje= $_GET["id"];
	include('databaseConnection.php');	
	mysql_query("DELETE FROM `cumbres`.`asignatura` WHERE `asignatura`.`id` = $id_mensaje",$conn);
	mysql_close($conn);
	header("Location: text.php?p=crear_a" ); 
?>
	