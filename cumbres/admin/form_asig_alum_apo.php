<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Asignar alumnos a apoderado</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
</head>
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
<body><div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Datos del Apoderado</a></div>
 			<div class="step-light-round">&nbsp;</div>
</div>
  <form id="formUsuario" name="formUsuario" method="post" action="text.php?p=form_asig_alum_apo&rut=<?php echo"$rut" ?>">
   <table width="44%" border="0" align="left" cellpadding="0" cellspacing="0"  id="id-form">
  <tr>
        <th width="15%" valign="top"><span class="Estilo3">Rut Apoderado:</span></th>
  <th width="41%"><label>
          <input type="text" name="rut_ap" id="rut_ap" onblur="javascript:g=revisa_RUT(this,'n');if(g!=true){alert(g);ff(this);};">
        </label></th>
      <th width="24%"><label>
        <input type="submit" name="buscar" id="buscar" value="Buscar">
      </label></th>
      
      
      
      <td width="20%"></td>
      <!--///-->
      <?php include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
	$rut_nu = isset($_POST['rut_ap']) ? $_POST['rut_ap'] : NULL;  
 
 if($rut_nu !=""){
 $sql2=mysql_query("SELECT * FROM  apoderado  where rut = '$rut_nu'",$conn);
		while($rs2=mysql_fetch_array($sql2))
			{
				$rut_Ap2=$rs2['rut'];
  				$nombre_2=$rs2['nombres'];
				$apellidop_2 = $rs2['apellido_P'];
				$apellidom_2=$rs2['apellido_M'];

 ?>
     </tr>
  <tr>
    <th valign="top">&nbsp;</th>
    <th colspan="2"><?php echo"$rut_Ap2 $nombre_2 $apellidop_2 $apellidom_2";?><a href="text.php?p=form_apo_ing_alum&rut=<?php echo"$rut_Ap2 "; ?>" title="Asignar Alumno" class="icon-1 info-tooltip"></a></th>
    <td></td>
<?php    					    }
						
}?>
  </tr>
  </table>
  </form>
</body>
</html>
