function getXMLHttpRequest(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function TraerPagina(datos,contenedor){
	divResultado = document.getElementById(contenedor);
	ajax=getXMLHttpRequest();
	ajax.open("GET", datos);
	ajax.onreadystatechange=function(){
	if(ajax.readyState==1)
		{divLoader.innerHTML='<br/><br/><br/><center><img widht="50" height="50" src="./loading.gif"/><br/>Cargando...</center>'}
		else{
			if(ajax.readyState==4){divResultado.innerHTML=ajax.responseText;divLoader.innerHTML=''}
			}
		}
	ajax.send(null)
}

function ComprobarUsuario(datos,contenedor){
	divResultado = document.getElementById(contenedor);
	
	username_=document.formUsuario.txt_username.value;
	
	ajax=getXMLHttpRequest();
	ajax.open("POST", datos);
	ajax.onreadystatechange=function(){
	if(ajax.readyState==1)
		{divResultado.innerHTML='<br/><br/><br/><center><img widht="50" height="50" src="./loading.gif"/><br/>Cargando...</center>'}
		else{
			if(ajax.readyState==4)
			{divResultado.innerHTML=ajax.responseText;}
			}
		}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("username="+username_);
}
