<?php
$q=$_GET["q"];

include('databaseConnection.php');





 mysql_query("SET NAMES 'utf8'");
$query1="SELECT carga.id_curso,carga.id_asignatura,asignatura.id,asignatura.`nombre` FROM carga,asignatura WHERE carga.id_curso='".$q."' and carga.id_asignatura=asignatura.id group by id_asignatura";

$res1=mysql_query($query1); 
$numcol = 6; 
$x=0;
$i=0; 
echo '<table  border="1" >'; 
while ($carga1=mysql_fetch_array($res1)) { 
	$nom = $carga1['nombre'];
	$id = $carga1['id'];

if ($x % $numcol==0) {
echo '
<tr><td width="160"><input type="checkbox" id='.$i.' name ='.$i.' />'.$nom.'</td>';
$i++;
} 
elseif ($x % $numcol==$numcol - 1) {
echo '<td  width="160"><input type="checkbox" id='.$i.' name ='.$i.' />'.$nom.'</td></tr>';
$i++;
} 
else {
echo '<td  width="160"><input type="checkbox" id='.$i.' name ='.$i.' />'.$nom.'</td>';
$i++;
} 
$x++;


} 
echo '</table>'; 

?>