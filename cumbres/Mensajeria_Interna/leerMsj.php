<?php

// Integro el archivo que contiene la clase para conectar
require 'includes/conexion.php';
	// Instancio la clase a una variable $db
	$db = new Db();
	// Creo la variable $query y le asigno la consulta
	$query = "SELECT * FROM mensajes ORDER BY id desc LIMIT 10";
	// Creo la variable resultados, va a ser igual al método query sobre la conexion creada
	$results = $db->mysql->query($query);
	
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
				<p class="autor">Autor: <span class="captions"><?php echo $autor; ?></span></p>
				<p class="fecha">Fecha: <span class="captions"><?php echo $fecha; ?></span></p>
				<p class="hora">Hora: <span class="captions"><?php echo $hora; ?></span></p>
				
				<div class="clear"></div>
				
				<p class="mensaje_texto">
					<?php echo $mensaje; ?>
				</p>
			</div><!-- Fin .mensaje -->
		<?php
		}
	}
?>
