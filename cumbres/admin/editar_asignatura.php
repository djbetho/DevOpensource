<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $nombre=$_POST["nombre"];
  $descripcion=$_POST["descripcion"];
   $cantidad_nota=$_POST["cantidad"];
 $id=$_GET["id"];
$query =  "UPDATE  `cumbres`.`asignatura` SET  `nombre` =  '$nombre', `descripcion` =  '$descripcion', `cantida_nota` =  '$cantidad_nota' WHERE  `asignatura`.`id` =$id;";

					mysql_query($query) or die(mysql_error());

		mysql_close($conn);
	header("Location:text.php?p=crear_a" );		
?>	
