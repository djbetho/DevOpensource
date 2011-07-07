<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $nombre=$_POST["nombre"];
 $descripcion =$_POST["descripcion"];
 $cantidad =$_POST["cantidad"];
 
$query = "INSERT INTO asignatura(nombre,descripcion, cantida_nota) VALUES ('$nombre', '$descripcion', '$cantidad' )";
					mysql_query($query) or die(mysql_error());


				header("Location: text.php?p=crear_a" ); 
				
?>		