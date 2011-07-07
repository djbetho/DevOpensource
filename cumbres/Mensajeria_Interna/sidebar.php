
		
		<div id="sidebar">
			
			<h3>Deje su mensaje</h3>
			
			<form id="envioMsj" action="includes/agregarMensaje.php" method="post">
				<p>
					<label for="autor">Autor: </label><br />
					<input type="hidden" name="autor" id="autor" value="<?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>" />
					<span class="autor"><?php echo $_SESSION['username']." (".$_SESSION['nombre']." ".$_SESSION['apellido'].")"; ?></span>
				</p>
				
				<p>
					<label for="campo_mensaje">Su mensaje: </label><br />
					<textarea name="campo_mensaje" id="campo_mensaje" cols="35" rows="10"></textarea>
				</p>
				
				<input class="reset" type="reset" value="Borrar campos" />
				<input class="submit" type="submit" name="enviarMensaje" value="Enviar Mensaje" />				
				<div class="clear"></div>
				
			</form>
			
			<h3>Estadísticas de mensajes</h3>
			<ul class="statics">
				<?php
				
				$query_hoy = "SELECT * FROM mensajes WHERE fecha='".date('Y-m-d')."'";
				$results = $db->mysql->query($query_hoy);
				$msjs_hoy = $results->num_rows;
				
				$query_mes = "SELECT * FROM mensajes WHERE month(fecha)='".date('m')."' AND year(fecha)='".date('Y')."'";
				$results = $db->mysql->query($query_mes);
				$msjs_mes = $results->num_rows;
				
				$query_anno = "SELECT * FROM mensajes WHERE year(fecha)='".date('Y')."'";
				$results = $db->mysql->query($query_anno);
				$msjs_anno = $results->num_rows;
				
				$query_total = "SELECT * FROM mensajes";
				$results = $db->mysql->query($query_total);
				$msjs_totales = $results->num_rows;
				
				
				?>
				<li>Mensajes de hoy: <span><?php echo $msjs_hoy; ?></span></li>
				<li>Mensajes de este mes: <span><?php echo $msjs_mes; ?></span></li>
				<li>Mensajes de este año: <span><?php echo $msjs_anno; ?></span></li>
				<li>Total de mensajes: <span><?php echo $msjs_totales; ?></span></li>
			</ul>
			
			<img src="images/cal2011.jpg" alt="Calendario 2011" />
		</div>