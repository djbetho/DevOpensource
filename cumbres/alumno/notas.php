 <div >

<form action="Imorimir.php" method="post" name="form1" id="form1">
  <?php
include('databaseConnection.php');
$sql=mysql_query("select * from usuario where rut = '13.537.652-3'",$conn);
		while($rs=mysql_fetch_array($sql))
  
			{
   
				$nom = $rs['nombre'];
				$apP = $rs['apellidoP'];
				$apM = $rs['apellidoM'];
				$rt=$rs['rut'];
  
			}
$sql2=mysql_query("SELECT `rut`,`nombres`,`apellido_P`,`apellido_M` FROM `alumno` WHERE rut='$rt' LIMIT 0, 30 ");
while($rs3=mysql_fetch_array($sql2)){
		$nombre=$rs3['nombres'];
		$rut=$rs3['rut'];
		$apellido_paterno=$rs3['apellido_P'];
		$apellido_materno=$rs3['apellido_M'];
		}
$sql3=mysql_query("SELECT `nota`.`semestre`,`profesor`.`rut`, `profesor`.`nombres`, `profesor`.`apellido_P` FROM `nota`,`profesor`,`profesor_jefe`,`asig_alumno`WHERE `profesor`.`rut`=`profesor_jefe`.`rut_profesor` and `profesor_jefe`.`id_curso`=`asig_alumno`.`id_curso` and `asig_alumno`.`rut_alumno`='$rt'");
while($rs4=mysql_fetch_array($sql3)){
		$Pnombre=$rs4['nombres'];
		$rut_p=$rs4['rut_profesor'];
		$Papellido_paterno=$rs4['apellido_P'];
		$Papellido_materno=$rs4['apellido_M'];
		$Semestre=$rs4['semestre'];
		}
        ?>
    <table width="816"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
        <td width="43"  bgcolor="#FF9900"><div align="center">Cod</div></td>
      <td width="213" bgcolor="#FF9900"><div align="left">Nombre Asignatura</div></td>
      
       
    <?php   $query = "SELECT MAX(asignatura.cantida_nota)  FROM  asignatura , nota WHERE  nota.rut_alumno ='$rut'"; 
				 
				$result = mysql_query($query) or die(mysql_error());
					
					while($row = mysql_fetch_array($result)){
						$contador=$row['MAX(asignatura.cantida_nota)'];
							
					}
			
			
			    for($i=1; $i <= $contador ; $i++){
				echo"<td width='29' bgcolor='#FF9900'><div align='left'> N$i </div></td>";
				
				}
		echo"<td width='28' bgcolor='#FF9900'><div align='left'>Prom.</div></td>";
			?>
      </tr>
           
      

        <?php
$rows=mysql_query("SELECT  `nota`.`id_asignatura` ,  `nota`.`nota` ,  `nota`.`rut_alumno` ,  `asignatura`.`nombre` FROM  `nota` ,  `asignatura` WHERE  `nota`.`rut_alumno` ='$rut' AND  `nota`.`id_asignatura` =  `asignatura`.`id` GROUP BY  `asignatura`.`id`");
		
		
		while($row=mysql_fetch_array($rows)){
		$asig_secc_jorn=$row['id_asignatura'];
		$asignatura_acta=$row['nombre'];
        ?>
    <tr>
         <td   bgcolor="#0066FF"><div align="center"><?php echo $row['id_asignatura'];?></div></td>
         <td bgcolor="#0066FF"><a href="detalle.php?id=<?php echo $row['id_asignatura'];?>"> <?php echo $row['nombre'];?></a> </td>
        <?php
       
		$sql=mysql_query("SELECT nota   FROM  nota WHERE rut_alumno ='$rut' and id_asignatura = '$asig_secc_jorn' ");

		while($row2=mysql_fetch_array($sql)){
	
		$nota=$row2['nota'];
        ?>
        <td width='12' height='20%'  > <input type="text" name="nota" id="nt"  disabled="disabled" value="<?php echo $row2['nota'] ?>"    size="2" maxlength="2" /> </td>
    
   
        <?php
		 
		}
		
	
	 
		?> 
        <?php
       
		
$sql2=mysql_query(" SELECT ROUND( SUM( nota ) / COUNT( nota ) )  AS total FROM  nota WHERE nota >0 AND  id_asignatura ='$asig_secc_jorn' AND  rut_alumno ='$rut' ");
		while($row2=mysql_fetch_array($sql2)){
	$nota = isset($row2['nota']) ? $row2['nota']: NULL;  
		
        ?>
        <td width="28" > <input type="text" name="nota"  id="nota"   disabled="disabled" value="<?php echo $row2['total'] ?>"     size="2" maxlength="2" /> </td>
        <?php
		 
		}
		}
		?>
      </tr>
       
        <tr>
            <td colspan="2"><input type="button" value="Imprimir" /></td>
        </tr>
        <tr>
          <td colspan="2"><div class="more_button">
		
 
	</div></td>
        </tr>
  </table>
    <div align="center"></div>
    <div align="center"></div>
</form>
</div>

