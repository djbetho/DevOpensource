<?php 
include('databaseConnection.php');
?>
<style type="text/css">
<!--
.Estilo6 {font-size: 18px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; }
-->
</style>
<form id="formUsuario" name="formUsuario" method="post" action="asignar_horario.php?nombre_bloque=<?php echo"$nombre_bloque" ?>&dia=<?php echo"$dia_horario" ?>">
<select name="id_curso" size="1" id="id_curso">
          <?php
		  
include('databaseConnection.php');
 mysql_query("SET NAMES 'utf8'");

		$sql=mysql_query("SELECT nombre, id_curso FROM curso ORDER BY curso.id_curso ASC",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$options=$rs['nombre'];
				$id = $rs['id_curso'];
	?>
          <option value="<?php echo"$id"; ?>"><?php echo"$options"; ?></option>
          <?php
	  }
	  ?>
        </select>

<table border="0" cellpadding="0" cellspacing="0">
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


$sql=mysql_query("SELECT nombre, desde, hasta, numero FROM bloque ",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$desde=$rs['desde'];
				$hasta = $rs['hasta'];
				$nombre_bloque = $rs['nombre'];
				$numero_bloque = $rs['numero'];
				


?>
  <tr>
    <td><div align="center"><?php echo "$desde a $hasta";?></div></td>
    
    
<?php 

$sql2=mysql_query("SELECT dia, numero FROM dia ",$conn);
		while($rs2=mysql_fetch_array($sql2))
{
	$dia_horario= $rs2['numero'];
	
	?>
<td><select name="<?php echo"$numero_bloque$dia_horario"; ?>" size="1" id="<?php echo"$numero_bloque$dia_horario"; ?>">
        <?php
		$sql3=mysql_query("SELECT id,nombre FROM asignatura",$conn);
		while($rs3=mysql_fetch_array($sql3))
			{
  				$options=$rs3['nombre'];
				$id = $rs3['id'];
	?>
        <option value="<?php echo"$id"; ?>"><?php echo"$options"; ?></option>
        <?php
	  }
	  ?>
      </select></td>
      <?php
				}


?>
</tr>
  <?php
  }?>  
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><input name="button" type="submit" class="form-guardar" id="button"  /></p>
</form>