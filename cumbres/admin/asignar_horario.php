<?php



include('databaseConnection.php');
/*

$query1="SELECT * from asignatura"; 
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

$bloque=$_POST["nombre_bloque"];
$id_curso=$_POST["id_curso"];

$dia=$_POST["dia_horario"];
*/
$curso= $_POST["id_curso"];
$query1="SELECT numero, nombre from bloque"; 
$res1=mysql_query($query1);  
while ($carga1=mysql_fetch_array($res1)) { 
	$numero_bloque = $carga1['numero'];
	$nombre_bloque = $carga1['nombre'];
///////////////////////////////////////////
$query2="SELECT numero from dia"; 
$res2=mysql_query($query2);  
while ($carga2=mysql_fetch_array($res2)) { 
	$numero_dia = $carga2['numero'];
	$id = $numero_bloque.$numero_dia;
	$ramo= $_POST["$id"];
	echo"$id ";
	echo"$ramo";
	$query="INSERT INTO asig_bloque (nombre_bloque, id_ramo, id_curso, dia) VALUES ('$nombre_bloque', $ramo, $curso, $numero_dia);";
mysql_query($query) or die(mysql_error());
}		
echo"</br>";		
}
echo"$carga[10]";
	
/*
$query="INSERT INTO asig_bloque (nombre_bloque, id_ramo, id_curso, dia) VALUES ('$bloque', '$id[$i]', '$id_curso', '$dia');";
//$query = "INSERT INTO carga (id_curso, id_asignatura, semestre)VALUES ($id_curso,$id[$i],'$semestre' )";
//
					mysql_query($query) or die(mysql_error());

}

}			mysql_close($conn);
	header("Location:text.php?p=crear_horario" );		
	echo"$id[$i] $bloque  $dia $id_curso";*/
?>		


