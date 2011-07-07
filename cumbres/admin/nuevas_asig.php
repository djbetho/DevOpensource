<head>
<script src="js/jquery/prototype-1.6.0.2.js" type="text/javascript"></script> 
<script type="text/javascript"><!--
 //<![CDATA[
function comprobar(nick) 
{
  var url = 'http://'+location.host+'/admin/ajax_comprobar_nick.php';
  var pars='asignatura=nick';
  var myAjax = new Ajax.Updater( 'comprobar_mensaje', url, { method: 'get', parameters: pars});
}
// -->
</script>
</head>
<body>
<table width="100%" height="51" border="0" cellpadding="0" cellspacing="0" id="product-table2">
    <tr>
      <th class="table-header-check">&nbsp;</th>
     <th  align="left"class="table-header-repeat  minwidth-1"><a href="" >Crear Asignaturas </a>	</th>
      <th class="table-header-repeat  minwidth-1"></th>
      <th class="table-header-options ">&nbsp;</th>
    </tr>
   
</table>
<p>&nbsp;</p>
<form id="form1" method='post' action="crear_nom.php">
<table width="925" border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr>
      <th width="279" valign="top">Nombres Asignatura:</th>
      <td width="229"><input name="nombre" class="inp-form" onKeyUp="comprobar(this.value)" id="nombre" /> </td>
      <td width="268" ></td>
    </tr>
    <tr>
      <th valign="top">Cantidad de Notas:</th>
      <td><input type="text" name="cantidad" class="inp-form-error" size="5" /></td>
      <td></td>
    </tr>
    <tr>
      <th valign="top">Descripcion</th>
      <td><textarea name="descripcion" cols="" class="form-textarea" id="descripcion"></textarea></td>
      <td><input type="submit" class="form-submit"  value="crear" /></td>
    </tr>
  </table>
  </form>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
                <tr>
					<th class="table-header-check">&nbsp;</th>
					<th class="table-header-repeat  minwidth-1"><a href="">Asignatura</a>	</th>
					<th class="table-header-repeat  minwidth-1"><a href="">Descripcion</a></th>
				    <th class="table-header-repeat minwidth-1"><a href="">Cantidad de notas</a></th>
				    <th class="table-header-options "><a href="">Opcion</a></th>
				</tr>
                <?php 
				
				include("databaseConnection.php");
				mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("SELECT id,nombre,descripcion,cantida_nota FROM  `asignatura`",$conn);
		while($rs=mysql_fetch_array($sql))
			{	$id_curso=$rs['id'];
  				$curso=$rs['nombre'];
				$descripcion = $rs['descripcion'];
				$cantidad = $rs['cantida_nota'];
			

?> 
				<tr>
	<td><input type="checkbox"  Onclick="document.formulario.descripcion.disabled=!document.formulario.descripcion.disabled"></td>
					<td><input type="text" name="texto" value="<?php echo"$curso"; ?>"  class="inp-form" disabled>
                    </td>
					<td><input type="text" name="texto2" value="<?php echo"$descripcion"; ?>" class="inp-form" disabled></td>
				    <td class="options-width"><?php echo"$cantidad"; ?></td>
		          <td class="options-width">
					<a href="popup.php?id=<?php echo"$id_curso"; ?>"" title="Editar" class="icon-1 info-tooltip"  ></a><a href="borrar_asignacion.php?id=<?php echo"$id_curso"; ?>" title="Borrar" class="icon-2 info-tooltip" OnClick="if (! confirm('Esta seguro que quiere borrar la asignacion al curso  <?php echo"$curso"; ?> ')) return false;"   ></a><a href="" title="Guardar" class="icon-5 info-tooltip"></a></td>
   </tr>
                <?php
}
?>
</table>

</body>