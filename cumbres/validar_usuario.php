<?php

session_start();//crea una sesión o reanuda la actual
include('databaseConnection.php');//se incluye el archivo de conexion

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;  
$password = isset($_POST['password']) ? $_POST['password'] : NULL;  
 
 echo"$usuario $password";
	
	$result = mysql_query("SELECT password , permiso, rut,usuario FROM usuario WHERE usuario =  '$usuario'",$conn);// se selecciona el password, rut  y tipo de la tabla profesor cuyo nick sea igual a $usuario
	if($row = mysql_fetch_array($result)){
		if($row["password"] == $password ){// se asigna el valor de password_2 a la variable $password
			$_SESSION["SESION_USER"] = $row["rut"];// se le da el valor de rut a la sesion $_SESSION["k_username"]
			$tipo = $row['permiso'];// se asigna el valor de tipo a la variable $tipo
			
			if($tipo=='admin'){
			Header("Location: admin/text.php");			
			}
			if($tipo=='alumno'){
			Header("Location: alumno/text.php");	
			}
			if($tipo=='profesor'){
			Header("Location: profesor/text.php");	
			}
			if($tipo=='apoderado'){
			Header("Location: alumno/text.php");	
			}
		}
	if($row["password"] != $password){
			Header("Location: index.php?msg=401");//redireccionamiento a index.php 
			}
	}
	

mysql_close();// se termina la conexion a la base de datos
?>

