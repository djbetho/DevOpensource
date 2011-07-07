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
     <th  align="left"class="table-header-repeat  minwidth-1"><a href="" >Crear Curso</a>	</th>
      <th class="table-header-repeat  minwidth-1"></th>
      <th class="table-header-options ">&nbsp;</th>
    </tr>
   
</table>
   <p>&nbsp;</p>
<form id="form1" method='post' action="agregar_cur.php">
<table width="925" border="0" cellpadding="0" cellspacing="0"  id="id-form">
    <tr>
      <th width="279" valign="top">Nombres Curso:</th>
      <td width="229"><input name="nombre" class="inp-form" onKeyUp="comprobar(this.value)" id="nombre" /> </td>
      <td width="268" ></td>
    </tr>
    <tr>
      <th valign="top"></th>
      <td>&nbsp;</td>
      <td></td>
    </tr>
    <tr>
      <th valign="top">&nbsp;</th>
      <td>&nbsp;</td>
      <td><input type="submit" class="form-submit" /></td>
    </tr>
  </table>
</form>
 <table border="0" width="40%" cellpadding="0" cellspacing="0" id="product-table">
				
                <tr>
					<th class="table-header-check">&nbsp;</th>
					<th class="table-header-repeat  minwidth-1"><a href="">Nombre Curso</a>	</th>
					<th class="table-header-options "><a href="">Opcion</a></th>
				</tr>
                <?php 
				
				include("databaseConnection.php");
				mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("SELECT * FROM  `curso` ORDER BY  `curso`.`id_curso` ASC ",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$curso=$rs['nombre'];
				$id_cursos=$rs['id_curso'];
				
			

?> 
				<tr>
					<td><input  type="checkbox"/></td>
					<td><?php echo"$curso"; ?></td>
				  <td class="options-width">
					<a href="popup_curso.php?id_curso=<?php echo"$id_cursos"; ?>" title="Editar" class="icon-1 info-tooltip"></a><a href="borrar_curso.php?id=<?php echo"$id_cursos"; ?>" title="Borrar" class="icon-2 info-tooltip" OnClick="if (! confirm('Esta seguro que quiere borrar la asignacion al curso <?php echo"$curso"; ?> ')) return false;"></a><a href="" title="Guardar" class="icon-5 info-tooltip"></a></td>
				</tr>
                <?php
}
?>
</table>

</body>