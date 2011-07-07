<?php

include('databaseConnection.php');
?>
<div >
<p>
  
</p>
<table width="358" border="0">
 <?php
mysql_query("SET NAMES 'utf8'");
$sql=mysql_query("SELECT profesor.nombres, profesor.apellido_P, profesor.apellido_M, profesor.rut, carga_prof.id_asig, asignatura.nombre, asignatura.id, carga_prof.id_curso,curso.nombre as curso FROM curso,profesor, carga_prof, asignatura WHERE rut ='13.181.691-K' AND asignatura.id = carga_prof.id_asig and curso.id_curso=carga_prof.id_curso;",$conn);
		while($rs=mysql_fetch_array($sql))
  
			{
   
				$nom = $rs['nombres'];
				$apP = $rs['apellido_P'];
				$apM = $rs['apellido_M'];
				$curso = $rs['curso'];
				$rt=$rs['rut'];
  				$asig=$rs['nombre'];
				$asig_id=$rs['id'];
			
        ?> <tr>
    <td bgcolor="#99CC66" ><a href="text.php?p=grabar_nota&ids=<?php echo"$asig_id"; ?>"><?php echo"$asig_id";?></a></td>
    <td><a href="text.php?p=grabar_nota&ids=<?php echo"$asig_id"; ?>"><?php echo"$asig";?></a></td>
    <td><a href="text.php?p=grabar_nota&ids=<?php echo"$asig_id"; ?>"><?php echo"$curso";?></a></td>
  </tr><?php }
        ?>
</table>

<form action="grabar_nota.php" method="post" name="form1" id="form1">
    <table width="823"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
        <td width="102"  bgcolor="#FF9900"><div align="center">R.U.T.</div></td>
      <td width="287" bgcolor="#FF9900" ><div align="center">Nombre Alumno</div></td>
      
       
    <?php 
	 $query = "SELECT MAX(asignatura.cantida_nota)  FROM  asignatura"; 
				 
				$result = mysql_query($query) or die(mysql_error());
					
					while($row = mysql_fetch_array($result)){
						$contador=$row['MAX(asignatura.cantida_nota)'];
							
					}
			
			
			    for($i=1; $i <= $contador ; $i++){
				echo"<td width='29' bgcolor='#FF9900'><div align='left'> N$i </div></td>";
				
				}
		echo"<td width='30' bgcolor='#FF9900'><div align='left'>Prom.</div></td>";
			?>
      </tr>
           
      

        <?php 
		
		$id_asi = isset($_GET['ids']) ? $_GET['ids'] : NULL;  
 mysql_query("SET NAMES 'utf8'");
$rows=mysql_query("SELECT  `alumno`.`rut` ,  `alumno`.`nombres` ,  `alumno`.`apellido_P` ,  `alumno`.`apellido_M`, `nota` .id_asignatura	,`nota` .rut_alumno  FROM `nota` , `alumno` WHERE id_asignatura='$id_asi' group by `nota`.`rut_alumno` ");
		
		$N_rut =0;
		while($row=mysql_fetch_array($rows)){
		$alum=$row['rut'];
		$nomb=$row['nombres'];
		$ape=$row['apellido_P'];
		$apee=$row['apellido_P'];
        ?>
    <tr>
         <td   bgcolor="#0066FF"><div align="center"><?php echo $row['rut'];?>
           <input type="hidden" name="rut<?php echo"$N_rut";?>" id="rut<?php echo"$N_rut";?>" value ="<?php echo "$alum";?>" />
         </div></td>
         <td bgcolor="#0066FF"><div align="center"><a href="detalle.php?id=<?php echo $row['rut'];?>"> <?php echo $row['nombres'];?>  <?php echo utf8_encode($row['apellido_P']);?>  <?php echo utf8_encode($row['apellido_M']);?></a> </div></td>
        <?php
       
		$sql=mysql_query("SELECT nota ,id  FROM  nota WHERE rut_alumno ='$alum' and id_asignatura = '$asig_id' ");
		$N_nota = 0;
		while($row2=mysql_fetch_array($sql)){
		$id_nota=$row2['id'];
		$nota=$row2['nota'];
		$rut_alumno = $row['rut'];
        ?>
 <td width='12' height='20%'  > <input type="text" name="nt<?php echo "$rut_alumno,$N_nota"; ?>" id="nt<?php echo "$rut_alumno,$N_nota"; ?>"   value="<?php echo $row2['nota'] ?>"    size="2" maxlength="2" />
   <input type="hidden" name="id_nota<?php echo "$rut_alumno,$N_nota"; ?>" id="id_nota<?php echo "$rut_alumno,$N_nota"; ?>" value="<?php echo "$id_nota"; ?>" /></td>
 <?php
		$N_nota++;
		 
		}
		$N_rut++;
	
	 
		?> 
        <?php
       
		
$sql2=mysql_query(" SELECT ROUND( SUM( nota ) / COUNT( nota ) )  AS total FROM  nota WHERE nota >0 AND  id_asignatura ='$asig_id' AND  rut_alumno ='$alum' ");
		while($row2=mysql_fetch_array($sql2)){
	$nota = isset($row2['nota']) ? $row2['nota'] : NULL;  
		 
        ?>
        <td width="27" > <input type="text" name="nota"  id="nota"   disabled="disabled" value="<?php echo $row2['total'] ?>"     size="2" maxlength="2" /> </td>
        <?php
		 
		}
		}
		?>
      </tr>
       <input name="num_rut" id="num_rut" type="hidden" value="<?php echo"$N_rut";?>" />
       <input name="num_nota" id="num_nota" type="hidden" value="<?php echo"$N_nota";?>" />
        <tr>
            <td colspan="2"><input name="Enviar" type="submit" value="Grabar" /></td>
        </tr>
        <tr>
          <td colspan="2"><div class="more_button">
		
   <?php
echo '<a href="javascript:history.back()">volver</a>';
?>
	</div></td>
        </tr>
  </table>
    
</form>
</div>

