<?php
include('databaseConnection.php');
?>
  <?php
	
		$sql=mysql_query("select * from usuario where rut = '13.537.652-3'",$conn);
		while($rs=mysql_fetch_array($sql))
  
			{
   
				$nom = $rs['nombre'];
				$apP = $rs['apellidoP'];
				$apM = $rs['apellidoM'];
			  $rut=$rs['rut'];
			}
			
	?>
<form action="registro.php" method="post" id="envio">
<p>&nbsp;</p>
<table width="200">
  <tr>
    <td> <?php
$rows=mysql_query("SELECT  * FROM `nota` , `asignatura`,alumno WHERE  `nota`.`rut_alumno` ='13.537.652-3' AND  `nota`.`id_asignatura` =  `asignatura`.`id` GROUP BY  `asignatura`.`nombre`");
			
		while($row=mysql_fetch_array($rows)){
		$asig_secc_jorn=$row['id_asignatura'];
		$asignatura_acta=$row['nombre'];
		$nombre=$row['nombres'];
		?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a  href="detalle.php?id=<?php echo $row['id_asignatura'];?>"><?php echo $row['nombre'];?></a>  <?php }?></td>
  </tr>
</table>

</form>
