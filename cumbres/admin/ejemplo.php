
<body>
<div id='divBuscarPersona' style="overflow:auto;">
<fieldset><legend><strong>BUSQUEDA PERSONAS:</strong></legend>
<!--CAMPOS OCULTOS PARA EL MANEJO DE LA PAGINACION-->
<input type="hidden" name="pagPersona" id="pagPersona" value="1">
<input type="hidden" name="TotalRegPersona" id="TotalRegPersona">
<table>
<tr><td>Por:</td>
<td>
<select name="campoPersona" id="campoPersona"
onChange="javascript:pagPersona.value=1;buscarPersona(event)">
<option value="CONCAT(apellidos,' ',nombres)">Apellidos y Nombres</option>
<option value="NroDoc">Nro Doc.</option>
</select>
</td></tr>
<tr><td>
<input type="hidden" id="txtIdPersona" />
Descripción:</td>
<td>
<input name="frasePersona" id="frasePersona" onblur="autocompletar_blur('divregistrosPersona')"
onkeyup="javascript:pagPersona.value=1;buscarPersona(event)" style="width:230px">
<div id="divregistrosPersona" class="autocompletar"  style="display:none"></div>
</td></tr></table>
</fieldset></div>
</body>
</html