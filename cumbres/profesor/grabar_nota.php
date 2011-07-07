<?php

$num_rut=$_POST["num_rut"];//numero de alumnos 
$num_nota=$_POST["num_nota"];//cantidad de notas por alumno

//////////////////////////////////////////////////////////////////
//for para guardar los rut de los alumnos en un arreglo $rut_alumno[]
$N_rut=0;
for ($i = 1; $i <= $num_rut; $i++) {
    $rut_alumno[]=$_POST["rut$N_rut"];//post del que se recojen los rut de los alumnos para guardarlos
	$N_rut++;
}

//////////////////////////////////////////////////////////////////
//for para guardar las notas de todos los alumnos en un arreglo $nota[]
$n=0;
for ($w = 1; $w <= $num_rut; $w++) { 	
$N_nota=0;	
for ($z = 1; $z <= $num_nota; $z++) {
$nota[]= isset($_POST ["nt$rut_alumno[$n],$N_nota"]) ? $_POST ["nt$rut_alumno[$n],$N_nota"]: NULL;  
   //$nota[]=$_POST ["nt$rut_alumno[$n],$N_nota"];//post del que se recojen las notas para guardarlas
	$N_nota++;
}
$n++;		
}

/////////////////////////////////////////////////////////////////////
//for para guardar los id de las notas en un arreglo $id_nota[]
$nn=0;
for ($ww = 1; $ww <= $num_rut; $ww++) { 	
$N_nota2=0;	
for ($zz = 1; $zz <= $num_nota; $zz++) {
  $id_nota[] = isset($_POST ["id_nota$rut_alumno[$nn],$N_nota2"]) ? $_POST ["id_nota$rut_alumno[$nn],$N_nota2"]: NULL;  
  // $id_nota[]=$_POST ["id_nota$rut_alumno[$nn],$N_nota2"];//post del que se recojen los id para guardarlos 
	$N_nota2++;
}
$nn++;		
}
////////////////////////////////////////////////////////////////////////

$numero_rut=0;
$numero_nota=0;
//for para recorer los registros y actualizar las notas
for ($a = 1; $a <= $num_rut; $a++) { //for que recorre el total de alumnos $num_rut

  for($b = 0; $b<= $num_nota-1; $b++) {//for que recorre el total de alumnos $num_nota - 1
  echo"$nota[$numero_nota] ";
  include('databaseConnection.php');
	if (!$conn)
		die('Could not connect: ' . mysql_error());
		

$sql ="UPDATE  `cumbres`.`nota` SET  `nota` =  '$nota[$numero_nota]' WHERE  `nota`.`id` ='$id_nota[$numero_nota]' AND  `nota`.`rut_alumno`='$rut_alumno[$numero_rut]'";// update de las notas segun el id y el rut del alumno
mysql_query($sql);
mysql_close();
  $numero_nota++;
  }
  $numero_rut++;
  }


?>
