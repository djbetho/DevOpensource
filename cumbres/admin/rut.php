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

<html><head><title>Probando...</title></head><body onload="document.getElementById('rut').focus();">
<form  action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
<input type="text" id="rut" name="rut" onblur="javascript:g=revisa_RUT(this,'n');if(g!=true){alert(g);ff(this);};"  />
</form></body></html>



