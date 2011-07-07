<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
-->
</style>

<form id="form1" method="post" action="asignar.php">
  <table width="100%" height="51" border="0" cellpadding="0" cellspacing="0" id="product-table2">
    <tr>
      <th class="table-header-check">&nbsp;</th>
     <th  align="left"class="table-header-repeat  minwidth-1"><a href="" >Asignaturas</a>	</th>
      <th class="table-header-repeat  minwidth-1"></th>
      <th class="table-header-options ">&nbsp;</th>
    </tr>
   
  </table>
  <p>&nbsp;</p>
  <p>

 <?php 

include('databaseConnection.php');
 mysql_query("SET NAMES 'utf8'");
$query1="SELECT * from asignatura"; 
$res1=mysql_query($query1); 
$numcol = 6; 
$x=0;
$i=0; 
echo '<table >'; 
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
</p>


<table>
  <tr>
    <td width="31"><p>
      <p>&nbsp;</p>
      <select name="id_curso" size="1" id="id_curso">
        <?php
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
        <p>&nbsp;</p>
      </p>
    
      <p>
        <input id="semestre" class="inp-form"  name="semestre" size="15" maxlength="8" />
        </p>
      <p>&nbsp; </p>
      <label>
        <input type="submit" class="form-submit" name="asignar" id="asignar" />
        </label>    </td>
  </tr>
</table>
<table border="1">
     
 

</table>
</form> 
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				
                <tr>
					<th width="7%" class="table-header-check">&nbsp;</th>
					<th width="5%" class="table-header-repeat  minwidth-1"><a href="">Codigo</a></th>
					<th width="25%" class="table-header-repeat  minwidth-1"><a href="">Curso</a>	</th>
					<th width="47%" class="table-header-repeat  minwidth-1"><a href="">Asignaturas inscritas </a></th>
				    <th width="16%" class="table-header-options "><a href="">Opcion</a></th>
				</tr>
                <?php 
				mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("SELECT carga.id_curso,curso.nombre,count(carga.id_asignatura) as Asignadas FROM carga,curso WHERE carga.id_curso=curso.id_curso group by carga.id_curso",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$curso=$rs['nombre'];
				$asign = $rs['Asignadas'];
				$id_curso=$rs['id_curso'];

?> 
				<tr>
					<td><input  type="checkbox"/></td>
					<td><?php echo"$id_curso"; ?></td>
					<td><?php echo"$curso"; ?></td>
					<td><a href="Lista_asign"><?php echo"$asign"; ?></a></td>
				  <td class="options-width" >
					<a href="borrar_asignacion.php?id=<?php echo"$id_curso"; ?>" title="Borrar" class="icon-2 info-tooltip" OnClick="if (! confirm('Esta seguro que quiere borrar la asignacion al curso  <?php echo"$curso"; ?> ')) return false;"   ></a></td>
				</tr>
                <?php
}
?>
</table>

