
 <?php 
				$id_p = isset($_GET['id_curso']) ? $_GET['id_curso'] : NULL;  
				include("databaseConnection.php");
				mysql_query("SET NAMES 'utf8'");
		$sql=mysql_query("SELECT id_curso,nombre FROM curso where id_curso='$id_p'",$conn);
		while($rs=mysql_fetch_array($sql))
			{	
  				$nombre=$rs['nombre'];
				
			

?> 
<form id="form1" method='post' action="editar_curso.php?id=<?php echo"$id_p"?>">
<table width="925" border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr>
      <th width="279" valign="top">Nombres Curso:</th>
      <td width="229"><input name="nombre" class="inp-form" id="nombre" onKeyUp="comprobar(this.value)" value="<?php echo"$nombre" ?>" /> </td>
      <td width="268" ></td>
    </tr>
    <tr>
      <th valign="top">&nbsp;</th>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <th valign="top">&nbsp;</th>
      <td>&nbsp;</td>
      <td><input name="button" type="submit" class="form-guardar" id="button"  value="Editar" /></td>
    </tr>
  </table>
 </form>
  
                 <?php
}
?>
