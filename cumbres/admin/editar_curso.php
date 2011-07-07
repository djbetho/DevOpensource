<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $nombre=$_POST["nombre"];

 $id=$_GET["id"];
$query =  "UPDATE  `cumbres`.`curso` SET  `nombre` =  '$nombre' WHERE  `curso`.`id_curso`=$id;";

					mysql_query($query) or die(mysql_error());

		mysql_close($conn);
	header("Location:text.php?p=crear_curso" );		
?>	

