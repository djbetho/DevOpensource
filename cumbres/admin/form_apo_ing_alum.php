
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" language="javascript" src="ajax.js"></script>
<script >

function ff(a){b=a;setTimeout("b.focus();",0);setTimeout("b.select();",0);return true;};
/* BORRAR COMENTARIO:: Lo de arriba es un arreglo para Firefox */
function revisa_RUT(c,e){
var t="";var b=0;var w=c.value;for(i=0;i<w.length;i++){if(w.charAt(i)!=' '&&w.charAt(i)!='.'&&w.charAt(i)!='-'){t=t+w.charAt(i)};};if(t.length==8){t=0+t;};
if(t.length!=9){return 'Lo sentimos, pero el RUT no corresponde. Por favor intente nuevamente.';};
if(e=='e'){b=1;};a=t.substring(t.length-1,-1);d=t.charAt(t.length-1);if(d=='k'){d='K';};
if(isNaN(a)){return 'Lo sentimos, pero el RUT contiene caracteres invalidos. Por favor intente nuevamente.';};
if(b==1&&a>50000000){return 'Lo sentimos, pero el RUT ingresado no corresponde a un RUT de persona natural.';};
//if(b==0&&a<50000000){return 'Lo sentimos, pero el RUT ingresado no corresponde a un RUT de empresa.';};
if(!revisa_DV(a,d)){return 'Lo sentimos, pero el RUT es incorrecto. Por favor intente nuevamente.';};
c.value=a.substring(0,2)+'.'+t.substring(2,5)+'.'+t.substring(5,8)+'-'+d;
return true;};
function revisa_DV(a,b){if(a==null||b==null){return false;};
var s=0;var m=2;var d='0';var e=0;
for(i=a.length-1;i>=0;i--){s=s+a.charAt(i)*m;if(m==7){m=2;}else{m++;};};
var r=s%11;if(r==1){d='K';}else{if(r==0){d='0'}else{e=11-r;d=e+'';};};
if(b!=d){return false;};return true;};

</script>
<script language="JavaScript">
 function Abrir_ventana (pagina) {
 var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
 window.open(pagina,"",opciones);
 }
 </script>
<style type="text/css">
<!--
#sam {
	position:absolute;
	left:240px;
	top:134px;
	width:434px;
	height:177px;
	z-index:1;
	
	
	padding:15px;
}
.style1 {
	font-family: Calibri;
	font-weight: bold;
	color: #999999;

}
.style4 {
	font-family: Calibri;
	font-weight: bold;
	
	font-size:11px;
}
.ok{
	
	font-family: Calibri;
	font-weight: bold;
	
	font-size:12px;
}
.error{
	
	font-family: Calibri;
	font-weight: bold;
	
	font-size:12px;
}



.style8 {font-family: Calibri; color: #535353; }
.Estilo2 {font-family: Calibri; color: #666666; }
.Estilo3 {color: #666666}
-->
</style>
<?php
include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $rut=$_GET["rut"];
$sql=mysql_query("SELECT * FROM  apoderado where rut = '$rut'",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$nombre=$rs['nombres'];
				$apellidop = $rs['apellido_P'];
				$apellidom=$rs['apellido_M'];
				$direccion=$rs['domicilio'];
				


					    }
						
	?>
</head>
<body>
<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Datos del Apoderado</a></div>
 			<div class="step-light-round">&nbsp;</div>
            
           
</div>

   

  <table width="44%" border="0" align="left" cellpadding="0" cellspacing="0"  id="id-form">
  <tr>
        <th width="33%" valign="top"><span class="Estilo3">Rut:</span></th>
        <th width="61%"><?php echo"$rut"; ?></th>
        <th width="1%">&nbsp;</th>
        <td></td>
    </tr>
      <tr>
        <th valign="top"><span class="Estilo2">Nombre:</span></th>
        <th ><?php echo"$nombre"; ?></th>
        <th >&nbsp;</th>
        <td width="5%">&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Apellido Paterno:</span></th>
        <th><?php echo"$apellidop"; ?></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Apellido Materno:</span></th>
        <th><?php echo"$apellidom"; ?></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <th valign="top"><span class="Estilo3">Direccion:</span></th>
        <th><?php echo"$direccion"; ?></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <th valign="top"><span class="Estilo3">Foto:</span></th>
        <td><img src="images/msn foto copia.jpg" width="119" height="122"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="Estilo3"></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="Estilo3"></span></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
  <form id="formUsuario" name="formUsuario" method="post" action="text.php?p=form_apo_ing_alum&rut=<?php echo"$rut" ?>">
   <table width="44%" border="0" align="left" cellpadding="0" cellspacing="0"  id="id-form">
  <tr>
        <th width="15%" valign="top"><span class="Estilo3">Rut:</span></th>
  <th width="41%"><label>
          <input type="text" name="rut_al" id="rut_al" onblur="javascript:g=revisa_RUT(this,'n');if(g!=true){alert(g);ff(this);};">
        </label></th>
      <th width="24%"><label>
        <input type="submit" name="buscar" id="buscar" value="Buscar">
      </label></th>
      
      
      
      <td width="20%"></td>
      <!--///-->
      <?php include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
	$rut_nu = isset($_POST['rut_al']) ? $_POST['rut_al'] : NULL; 
 
 if($rut_nu !=""){
 $sql2=mysql_query("SELECT * FROM  alumno where rut = '$rut_nu'",$conn);
		while($rs2=mysql_fetch_array($sql2))
			{
  				$nombre_2=$rs2['nombres'];
				$apellidop_2 = $rs2['apellido_P'];
				$apellidom_2=$rs2['apellido_M'];

 ?>
     </tr>
  <tr>
    <th valign="top">&nbsp;</th>
    <th colspan="2"><?php echo"$nombre_2 $apellidop_2 $apellidom_2";?><a href="insertar_alu_apo.php?rut=<?php echo"$rut"; ?>&rut_alumno=<?php echo"$rut_nu"; ?>"><img src="images/add-32.png" width="20" height="20"></a></th>
    <td></td>
<?php    					    }
						
}?>
  </tr>
  </table>
  </form>
 
  
   <p>&nbsp;</p>
   <p>&nbsp;</p>
  <table width="441" align="left">
  <tr>
    <td width="118">Rut</td>
    <td width="258">Nombre</td>
    <td width="43">&nbsp;</td>
  </tr>
  <tr>
 <?php 
 
  $sql3=mysql_query("SELECT alumno.nombres,alumno.apellido_P,alumno.apellido_M,alumno_apoderado.rut_alumno,alumno_apoderado.rut FROM alumno_apoderado,alumno where alumno_apoderado.rut='$rut' and alumno.rut=alumno_apoderado.rut_alumno
;",$conn);
		while($rs3=mysql_fetch_array($sql3))
			{
  				$rut_alum=$rs3['rut_alumno'];
				$nombres_alum = $rs3['nombres'];
				$apellido_p_alum = $rs3['apellido_P'];
				$apellido_m_alum = $rs3['apellido_M'];

			

 ?>
 
    <td><a href="#"><?php echo"$rut_alum";?></a></td>
    <td><a href="#"><?php echo"$nombres_alum $apellido_p_alum $apellido_m_alum";?></a></td>
    <td></td></tr> 
 <?php }?>  
  
</table>


 


</body>

