<?php
	$id_mensaje= $_GET["id"];
	include('databaseConnection.php');	
	mysql_query("DELETE FROM `cumbres`.`curso` WHERE `curso`.`id_curso` =$id_mensaje",$conn);
	mysql_close($conn);
	header("Location: text.php?p=crear_curso" ); 
?>
	