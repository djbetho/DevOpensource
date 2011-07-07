<?php
$rut=strtoupper ($_POST ["rut"]);
$nombres=strtoupper ($_POST ["nombre"]);
$apellido_paterno=strtoupper ($_POST ["apellido_paterno"]);
$apellido_materno=strtoupper ($_POST ["apellido_materno"]);
$fecha_n=$_POST ["Fecha"];
$domicilio=strtoupper($_POST ["Domicilio"]);
$cole_an=strtoupper($_POST ["Colegio_Anterior"]);
$obs=strtoupper($_POST["observaciones"]);
$contrasena=$_POST ['Domicilio2'];
$passDM5 =md5 ($contrasena);

	include('databaseConnection.php');
	if (!$conn)
		die('Could not connect: ' . mysql_error());
		mysql_query("SET NAMES 'utf8'");
$sql = "UPDATE  `cumbres`.`alumno` SET  `nombres` =  '$nombres', `apellido_P` =  '$apellido_paterno', `apellido_M` =  '$apellido_materno', `Domicilio` =  '$domicilio' WHERE  `alumno`.`rut` =  '13.537.652-3'";

mysql_query($sql);


$sql2 = "UPDATE  `cumbres`.`usuario` SET  `nombre` =  '$nombres',`apellidoP` =  '$apellido_paterno', `apellidoM` = '$apellido_materno',`password` =  '$contrasena' WHERE  `usuario`.`rut` =  '13.537.652-3'";
mysql_query($sql2);

mysql_close();
header("Location: text.php?p=perfil");
?>
