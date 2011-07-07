<?php

include('databaseConnection.php');


$query1="SELECT * from asignatura, curso "; 
$res1=mysql_query($query1);  
while ($carga1=mysql_fetch_array($res1)) { 
	$nom[] = $carga1['nombre'];
	$id[] = $carga1['id'];
	}
 
 for ($a = 0; $a <=28; $a++) {
   $id_post[] =$_POST["$a"];
   $nombre_post[] =$_POST["$a"];
	}

for($i=0; $i<=28; $i++){
if($id_post[$i] == "on"){
echo"si asignada$id_curso <br>";

$id_curso=$_POST["id_curso"];
$semestre=$_POST["semestre"];

$query = "INSERT INTO carga (id_curso, id_asignatura, semestre)VALUES ($id_curso,$id[$i],'$semestre' )";
					mysql_query($query) or die(mysql_error());

}
else{
echo"no  asignada $id_curso <br>";
}
}			
				
?>		