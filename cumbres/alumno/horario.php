<?php 
include('databaseConnection.php');
$id = '69';
?>
<style type="text/css">
<!--
.Estilo6 {font-size: 18px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
-->
</style>



<table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="40" bgcolor="#333333"><div align="center"><span class="Estilo6">Horario</span></div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Lunes</div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Martes</div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Miercoles</div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Jueves</div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Viernes</div></td>
    <td width="100" height="40" bgcolor="#333333"><div align="center" class="Estilo6">Sabado</div></td>
 
  </tr>
<?php  

$numero =1;
$sql=mysql_query("SELECT nombre, desde, hasta FROM bloque ",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$desde=$rs['desde'];
				$hasta = $rs['hasta'];
				$nombre_bloque = $rs['nombre'];
				if ($numero%2==0) 
{ $color="#F5F5F5";
 } //escribo Par
else //Sino
{ $color="#FBFBFB"; }


?>
  <tr>
    <td><div align="center"><?php echo "$desde a $hasta";?></div></td>
    
    
<?php 

$sql2=mysql_query("SELECT dia, numero FROM dia ",$conn);
		while($rs2=mysql_fetch_array($sql2))
{
	$dia_horario= $rs2['numero'];
	 mysql_query("SET NAMES 'utf8'");
	
$sql3=mysql_query("SELECT asignatura.nombre ,count(asig_bloque.id_asig_bloque) as num
FROM dia, asig_bloque , asignatura, bloque
where asig_bloque.id_ramo = asignatura.id and bloque.nombre = asig_bloque.nombre_bloque and asig_bloque.dia=$dia_horario and asig_bloque.nombre_bloque='$nombre_bloque' and asig_bloque.id_curso = $id
",$conn);

		while($rs3=mysql_fetch_array($sql3))
			{
  				$nombre=$rs3['nombre'];
				$num=$rs3['num'];
				if($nombre==""){
				echo"<td bgcolor='$color'>&nbsp;</td>";
				}  
else{				
echo"<td bgcolor='#E3F6CE'><div align='center'>$nombre</div></td>";
    }
				}
				
				
				

}
$numero++;

?>
  </tr>
  <?php
  }?>
</table>


