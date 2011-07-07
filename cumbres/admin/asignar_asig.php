<?php

include('databaseConnection.php');
	
$query1="SELECT * from asignatura"; 
$res1=mysql_query($query1);  
while ($carga1=mysql_fetch_array($res1)) { 
	$nom[] = $carga1['nombre'];
	$id[] = $carga1['id'];
	}
 
 for ($a = 0; $a <=28; $a++) {
 $id_post[] = isset($_POST["$a"]) ? $_POST["$a"] : NULL;
    $nombre_post[] = isset($_POST["$a"]) ? $_POST["$a"] : NULL;
   
	}

for($i=0; $i<=28; $i++){
if($id_post[$i] == "on"){


$rut_prof = isset($_GET['rut_prof']) ? $_GET['rut_prof'] : NULL;
$id_curso=isset($_POST['id_curso']) ? $_POST['id_curso'] : NULL;


$query="INSERT INTO cumbres.carga_prof (rut_prof, id_curso, id_asig) VALUES ( '$rut_prof','$id_curso','$id[$i]');";

					mysql_query($query) or die(mysql_error());
$query2="DELETE FROM carga_prof WHERE id_curso is NULL and id_asig is NULL";

		mysql_query($query2) or die(mysql_error());
}

}			mysql_close($conn);
	
	Header("Location: ./text.php?p=carga_profesor&rut=$rut_prof");
	
?>		