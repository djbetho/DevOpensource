<?php
include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
	 $rut=$_GET["rut"];
	 $rut_alumno=$_GET["rut_alumno"];
	
	$sql=mysql_query("SELECT rut FROM alumno where rut='$rut'",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$verif=$rs['rut'];
				}
				if($verif==$rut){
				
				echo"Rut de alumno ya asignado";
				}
	else{
	
	
$query =  "INSERT INTO alumno_apoderado (`rut`, `rut_alumno`) VALUES ('$rut', '$rut_alumno');";	mysql_query($query) or die(mysql_error());
}

Header("Location: ./text.php?p=form_apo_ing_alum&rut=$rut");	

?>
