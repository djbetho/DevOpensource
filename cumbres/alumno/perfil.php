<?php

include('databaseConnection.php');
?>


<form action="registro.php"method="post" id="envio">
  <table width="797" height="191" border="0" align="center">
    <tr>
      <td height="19" colspan="4"><div align="center" class="Estilo1">
       <?php
include('databaseConnection.php');
$rutt = isset($_POST['rut']) ? $_POST['rut'] : NULL;  

mysql_query("SET NAMES 'utf8'");

$sql=mysql_query("SELECT alumno.rut,alumno.nombres,alumno.apellido_P,alumno.apellido_M,alumno.fecha_nac,alumno.Domicilio,usuario.password  FROM alumno,usuario where alumno.rut=usuario.rut and usuario.rut = '13.537.652-3'LIMIT 0, 30 ",$conn);
	
		while($rs=mysql_fetch_array($sql))
		  {
				$rutt=$rs['rut'];
				$nom = $rs['nombres'];
				$apP = $rs['apellido_P'];
				$apM = $rs['apellido_M'];
				
				$fech = $rs['fecha_nac'];
				$domi = $rs['Domicilio'];
				$pass = $rs['password'];
			
  
			}
  ?>
           <h1 class="mensajeLista">PERFIL </h1>
      </div></td>
    </tr>
<tr>
      <td height="19"><div align="right">Rut</div></td>
      
    <td width="445" > <input name='rut' type='text' id='rut' value="<?php echo"$rutt ";?>"  /> </td>
    </tr>
    <tr>  
      <td height="19"><div align="right">Nombres:</div></td>
      <td><input name='nombre' type='text' id='nombre' value="<?php echo"$nom";?>"  />      </td>
    </tr>
    <tr>
      <td height="19"><div align="right">Apellido Paterno</div></td>
      <td> <input name='apellido_paterno' type='text' id='apellido_paterno' value="<?php echo"$apP ";?>" /> </td>
    </tr>
    <tr>
      <td height="19"><div align="right">Apellido Materno</div></td>
      <td> <input name='apellido_materno' type='text' id='apellido_materno' value="<?php echo"$apM";?>"  /> </td>
    </tr>
    <tr>
      <td height="19"><div align="right">Fecha de Nacimiento</div></td>
      <td> <input name='Fecha' type='text' id='Fecha' value="<?php echo"$fech";?>"/> </td>
    </tr>
    <tr>
      <td height="19"><div align="right">Domicilio</div></td>
      <td><input name='Domicilio' type='text' id='Domicilio' value="<?php echo"$domi";?>"/></td>
    </tr>
    <tr>
      <td height="19" ><div align="right">Contraseña</div></td>
      <td ><input name='Domicilio2' type='text' id='Domicilio2' value="<?php echo"$pass";?>"/></td>
    </tr>
    <tr>
      <td height="19" >&nbsp;</td>
      <td ><label>
        <input type="submit" name="guardar" id="Guardar" value="Guardar" />
      </label></td>
    </tr>
  </table>
  

</form>


