<?php include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $rut=$_GET["rut"];
 
 $sql=mysql_query("SELECT * FROM  apoderado where rut = '$rut'",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$nombre=$rs['nombres'];
				$apellidop = $rs['apellido_P'];
				$apellidom=$rs['apellido_M'];
					    }
 ?>
<table width="646" border="0" align="center">
  <tr>
    <td colspan="5"><div align="center">El apoderado <?php echo"$nombre $apellidop $apellidom"; ?> rut <?php echo"$rut"; ?> fue registro satisfactoriamente.</div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="center">Desea registrar alumnos a este apoderado</div></td>
  </tr>
  <tr>
    <td width="253">&nbsp;</td>
    <td width="28">&nbsp;</td>
    <td width="36">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="264">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="button"  name="si" id="si" value="SI" class="form-submit" onclick="window.location.href='./text.php?p=form_apo_ing_alum&rut=<?php echo"$rut" ?>'" >
    </label></td>
    <td>&nbsp;</td>
    <td><label>
    <input type="button"  name="no" id="no" value="No" class="form-reset" onclick="window.location.href='./text.php'">
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>
