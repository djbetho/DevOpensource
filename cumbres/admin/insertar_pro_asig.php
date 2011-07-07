<?php
include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
	 $rut=$_GET["rut"];
	
	
	$sql=mysql_query("SELECT rut_prof FROM carga_prof where rut_prof='$rut'",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$verif=$rs['rut_prof'];
				}
				if($verif==$rut){
				
				echo"Rut de alumno ya asignado";
				}
	else{
$query="INSERT INTO carga_prof (rut_prof) VALUES ('$rut');";	mysql_query($query) or die(mysql_error());
	

}
Header("Location: ./text.php?p=carga_profesor&rut=$rut");	


?>
