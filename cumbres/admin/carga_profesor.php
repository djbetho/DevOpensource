
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" language="javascript" src="ajax.js"></script>
<script language="JavaScript">
 function Abrir_ventana (pagina) {
 var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
 window.open(pagina,"",opciones);
 }
 </script>
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
<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php
include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
	$rut = isset($_GET["rut"]) ? $_GET["rut"] : NULL; 
 
$sql=mysql_query("SELECT * FROM  profesor where rut = '$rut'",$conn);
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
<table width="100%" height="51" border="0" cellpadding="0" cellspacing="0" id="product-table2">
    <tr>
      <th class="table-header-check">&nbsp;</th>
     <th  align="left"class="table-header-repeat  minwidth-1"><a href="" >Buscar Profesor</a>	</th>
      <th class="table-header-repeat  minwidth-1"></th>
      <th class="table-header-options ">&nbsp;</th>
    </tr>
   
</table>
<form id="formUsuario" name="formUsuario" method="post" action="text.php?p=carga_profesor&rut=<?php echo"$rut" ?>">
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
 $sql2=mysql_query("SELECT * FROM  profesor where rut = '$rut_nu'",$conn);
		while($rs2=mysql_fetch_array($sql2))
			{
				
  				$nombre_2=$rs2['nombres'];
				$apellidop_2 = $rs2['apellido_P'];
				$apellidom_2=$rs2['apellido_M'];

 ?>
     </tr>
  <tr>
    <th valign="top">&nbsp;</th>
    <th colspan="2"><?php echo"$nombre_2 $apellidop_2 $apellidom_2";?><a href="insertar_pro_asig.php?rut=<?php echo"$rut_nu"; ?>"><img src="images/add-32.png" width="20" height="20"></a></th>
    <td></td>
<?php    					    }
						
}?>
  </tr>
  </table>
</form>

   <table width="441" align="left">
  <tr>
    <td width="118">Rut</td>
    <td width="258">Nombre</td>
    <td width="43">&nbsp;</td>
  </tr>
  <tr>
 <?php 
 
  $sql3=mysql_query("SELECT carga_prof.rut_prof,profesor.nombres,profesor.apellido_P,profesor.apellido_M FROM profesor,carga_prof where carga_prof.rut_prof='$rut' group by rut_prof",$conn);
		while($rs3=mysql_fetch_array($sql3))
			{
  				$rut_alum=$rs3['rut_prof'];
				$nombre_completo=$rs3['nombres'];
				$apellido=$rs3['apellido_P'];
				$apellidoP=$rs3['apellido_M'];

			

 ?>
 
    <td><a href="#"><?php echo"$rut_alum";?></a></td>
    <td><a href="#"><?php echo"$nombre_completo $apellido $apellidoP";?></a></td>
    <td></td></tr> 
 <?php }?>  
  
</table>

   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p> <form id="form1" method="post" action="asignar_asig.php?rut_prof=<?php echo"$rut_alum";?>">
   <div align="left"> <form>
   <select name="id_curso" size="1" id="id_curso" onchange="showUser(this.value)"  >
          <?php
		$sql=mysql_query("SELECT nombre, id_curso FROM curso ORDER BY curso.id_curso ASC",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$options=$rs['nombre'];
				$id = $rs['id_curso'];
	?>
          <option  value="<?php echo"$id"; ?>"><?php echo"$options"; ?></option>
          <?php
	  }
	  ?>
      </select></form> 
   <table width="100%" height="51" border="0" cellpadding="0" cellspacing="0" id="product-table2">
    <tr>
      <th class="table-header-check">&nbsp;</th>
     <th  align="left"class="table-header-repeat  minwidth-1"><a href="" >Asignaturas</a>	</th>
      <th class="table-header-repeat  minwidth-1"></th>
      <th class="table-header-options "></th>
    </tr>
   
  </table>
  <p><div id="txtHint"><b>Lista de Asignaturas por curso</b></div></p>
  

  
</form>

</p>
<input type="submit" class="form-submit" name="asignar" id="asignar" />
</body>

