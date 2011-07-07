
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
</head>
<body>
<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href="">Datos del Profesor(a)</a></div>
 			<div class="step-light-round">&nbsp;</div>
</div>

   
<form id="formUsuario" name="formUsuario" method="post" action="reg_profesor.php">
  <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
      <tr>
        <th valign="top"><span class="Estilo3">Rut:</span></th>
        <th><input name="txt_username" type="text" class="inp-form" id="txt_username" onblur="javascript:g=revisa_RUT(this,'n');if(g!=true){alert(g);ff(this);};" size="13" maxlength="13"  /></th>
  <th><input name="button" type="button" class="form-verificar" id="button" value="" onClick="javascript:ComprobarUsuario('./comprobarPro.php','estadoUser')" /></th>
        <td><div class="error-left"></div>
			<div class="error-inner"><div id="estadoUser"></div></div></td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo2">Nombre:</span></th>
        <th ><input name="nombres"   type="text" class="inp-form" id="nombres" /></th>
        <th >&nbsp;</th>
        <td width="38%">&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Apellido Paterno:</span></th>
        <th><input name="apellidos" type="text" class="inp-form" id="apellidos" /></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Apellido Materno:</span></th>
        <th><input name="apellidos2" type="text" class="inp-form" id="apellidos2" /></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Ciudad:</span></th>
        <th><input name="ciudad" type="text" class="inp-form" id="ciudad" /></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Direccion:</span></th>
        <th><input name="direccion" type="text" class="inp-form" id="direccion" /></th>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Fecha de Nacimiento:</span></th>
        <th>&nbsp;</td>
        <th>        
        <td>	</td>
      </tr>
      <tr>
        <th valign="top"><span class="Estilo3">Foto:</span></th>
        <td><input name="foto" type="file" class="file_1" id="foto" /></td>
        <td>&nbsp;</td>
        <td><div class="bubble-left"></div>
	<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	<div class="bubble-right"></div></td>
      </tr>
      <tr>
        <td><span class="Estilo3"></span></td>
        <td><input type="submit" class="form-submit"  value="" />
          <input type="reset" class="form-reset" value=""  /></td>
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
   
</form>
 


</body>

