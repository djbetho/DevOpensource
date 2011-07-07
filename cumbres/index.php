<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="admin/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login"></div>
<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	<form action="validar_usuario.php" method="post" id="login">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Usuario</th>
			<td><input name="usuario" type="text"  class="login-inp" id="usuario"  onblur="javascript:g=revisa_RUT(this,'n');if(g!=true){alert(g);ff(this);};"  size="13" maxlength="13"  /></td>
		</tr>
		<tr>
			<th>Contraseña</th>
			<td><input name="password" type="password" class="login-inp" id="password"  onfocus="this.value=''" value="************" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" />
			<label for="login-check">Recuerdame</label></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
	
	</form>
 	 <?php
$error = isset($_GET['error']) ? $_GET['error'] : NULL;  
                    
$msg = isset($_GET['msg']) ? $_GET['msg'] : NULL;  
							 

					     if($error == '401'){ echo"<p class='Estilo3'>Error, Usuario y/o contraseña incorrecta</p>"; }

							   if($msg == "501"){echo"<p class='Estilo3'>Sesion finalizada</p>";}

						if($error== "402"){echo" <p class='Estilo3'>Para acceder a este contenido debe iniciar sesión</p>"; }

					    if($error== "403"){echo" <p class='Estilo3'>Para acceder a este contenido debe iniciar sesión como administrador</p>"; }

							  ?>
							  <!--  end login-inner -->
	</div>
	<div class="clear"></div>
	<a href="" class="forgot-pwd">perdio la contraseña?</a>
 </div>
 <!--  end loginbox -->
 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Porfavor ingrese su correo electronico para reenviar contraseña.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Correo Electronico:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Ir a login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
