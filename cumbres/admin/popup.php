
 <?php 
				$id_p = isset($_GET['id']) ? $_GET['id'] : NULL;  
				include("databaseConnection.php");
				mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("SELECT id,nombre,descripcion,cantida_nota FROM  `asignatura` where id='$id_p'",$conn);
		while($rs=mysql_fetch_array($sql))
			{	
  				$nombre=$rs['nombre'];
				$descripcion = $rs['descripcion'];
				$cantidad = $rs['cantida_nota'];
			

?> 
<form id="form1" method='post' action="editar_asignatura.php?id=<?php echo"$id_p"?>">
<table width="925" border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr>
      <th width="279" valign="top">Nombres Asignatura:</th>
      <td width="229"><input name="nombre" class="inp-form" id="nombre" onKeyUp="comprobar(this.value)" value="<?php echo"$nombre" ?>" /> </td>
      <td width="268" ></td>
    </tr>
    <tr>
      <th valign="top">Cantidad de Notas:</th>
      <td><input name="cantidad" type="text" class="inp-form-error" value="<?php echo"$cantidad"?>" size="5" /></td>
      <td></td>
    </tr>
    <tr>
      <th valign="top">Descripcion</th>
      <td><textarea name="descripcion" cols="" class="form-textarea" id="descripcion"><?php echo"$descripcion"?>
</textarea></td>
      <td><input name="button" type="submit" class="form-guardar" id="button"  value="Editar" /></td>
    </tr>
  </table>
  </form>
  
                 <?php
}
?>
