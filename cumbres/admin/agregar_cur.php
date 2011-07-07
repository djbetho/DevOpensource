<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $nombre=$_POST["nombre"];
 
$query =  "INSERT INTO  `cumbres`.`curso` (`id_curso` ,`nombre`)VALUES (NULL ,  '$nombre')";

					mysql_query($query) or die(mysql_error());

		mysql_close($conn);
	header("Location:text.php?p=crear_curso" );		
?>	