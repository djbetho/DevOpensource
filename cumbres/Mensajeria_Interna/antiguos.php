<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Mensajería Interna - Mensajes Antiguos</title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/styles.css" />
	
	<!-- Scripts -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
	
	<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme_toolbar_location : "top"
	});
	</script>


</head>
<body>
	<div id="contenedor">
		
		<div id="cabecera">
			<h1 class="logo"><a href="index.php" title="Mensajería Interna">Mensajería Interna</a></h1>
			
			<ul class="nav">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="antiguos.php">Mensajes antiguos</a></li>
				<li><a href="logout.php">LogOut</a></li>
			</ul>
			
			<div class="clear"></div>
		</div>
		
		<div id="main">
			<?php
			
			if (isset($_POST['verMensajes'])) {

				require 'includes/conexion.php';
				$db = new Db();
				$query = "SELECT * FROM mensajes WHERE year(fecha)='".htmlspecialchars($_POST['anio'])."' AND month(fecha)='".htmlspecialchars($_POST['mes'])."' ORDER BY id desc";
				$results = $db->mysql->query($query);
				$encontrados = $results->num_rows;
				$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
				
				if ($encontrados!=0) {
					echo "<h3 class='encontrado'>Se encontraron ".$encontrados." mensajes durante el mes de ".$meses[(htmlspecialchars($_POST['mes'])-1)]." en el año ".htmlspecialchars($_POST['anio']).".</h3>";
					
					// Si hay algún valor después de realizar la consulta...
					if($results->num_rows) {
						// Creo la variable temporal $row que se le va asignando en cada vuelta el valor de cada fila
						while($row = $results->fetch_object()) {
							$autor = $row->autor;
							$fecha = $row->fecha;
							$hora = $row->hora;
							$mensaje = $row->mensaje;
							?>
							<div class="mensaje">
								<p class="autor">Autor: <span><?php echo $autor; ?></span></p>
								<p class="fecha">Fecha: <span><?php echo $fecha; ?></span></p>
								<p class="hora">Hora: <span><?php echo $hora; ?></span></p>
								
								<div class="clear"></div>
								
								<p class="mensaje_texto">
									<?php echo $mensaje; ?>
								</p>
							</div><!-- Fin .mensaje -->
						<?php
						}
					}
				}
				else {
					echo "<h3 class='encontrado'>No se encontraron mensajes durante el mes de ".$meses[($_POST['mes']-1)]." en el año ".$_POST['anio'].".</h3>";
				}
			}
			else {
				echo "<h3 class='encontrado'>Seleccione año y mes desde la barra lateral para filtrar los mensajes</h3>";
			}
			?>
		</div>
		
		<div id="sidebar">
			
			<h3>Ver mensajes</h3>
			
			
			
			<form action="" method="post">
				<p>
					<label for="meses">Año: </label><br />
					<SELECT NAME="anio" SIZE="1">
						<OPTION VALUE="2010">2010</OPTION>
						<OPTION selected="selected" VALUE="2011">2011</OPTION>
					</SELECT> 
				</p>
				
				<p>
					<label for="mes">Mes: </label><br />
					<SELECT NAME="mes" SIZE="1">
						<OPTION VALUE="1">Enero</OPTION>
						<OPTION VALUE="2">Febrero</OPTION>
						<OPTION VALUE="3">Marzo</OPTION>
						<OPTION VALUE="4">Abril</OPTION>
						<OPTION VALUE="5">Mayo</OPTION>
						<OPTION VALUE="6">Junio</OPTION>
						<OPTION VALUE="7">Julio</OPTION>
						<OPTION VALUE="8">Agosto</OPTION>
						<OPTION VALUE="9">Setiembre</OPTION>
						<OPTION VALUE="10">Octubre</OPTION>
						<OPTION VALUE="11">Noviembre</OPTION>
						<OPTION VALUE="12">Diciembre</OPTION>
					</SELECT>
					
				</p>
				
				<input class="submit" type="submit" name="verMensajes" value="Ver Mensajes" />				
				<div class="clear"></div>
				
			</form>
			
			<img src="images/cal2011.jpg" alt="Calendario 2011" />
		</div>
		
		<div class="clear"></div>
		
		<div id="footer">
			<p>Mensajería Interna</p>
			<p>Idea y realización de <a href="http://interacciondigital.net" target="_blank"><strong>Ariel Mariani</strong></a></p>
		</div>
		
	</div><!--Fin #contenedor-->
</body>
</html>
