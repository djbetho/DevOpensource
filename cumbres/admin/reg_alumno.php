<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
$rut = isset($_POST['txt_username']) ? $_POST['txt_username'] : NULL; 
 $nombres=isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
  $apellidos=isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL;
   $apellidos2=isset($_POST['apellidos2']) ? $_POST['apellidos2'] : NULL;
    $ciudad=isset($_POST['ciudad']) ? $_POST['ciudad'] : NULL;
	 $direccion=isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
	  $fecha=isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
	   $comentario=isset($_POST['cometario']) ? $_POST['comentario'] : NULL;
	    $foto=isset($_POST['foto']) ? $_POST['foto'] : NULL;
		 $curso=isset($_POST['id_curso']) ? $_POST['id_curso'] : NULL;
		 

		$sql=mysql_query("SELECT rut FROM alumno where rut='$rut'",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$verif=$rs['rut'];
				}
				if($rut==""){
				echo"Rut No Ingresado ";
				?>
                
                    <script type="text/javascript">
					function redireccionar(){
					  window.location="./text.php?p=registro_alu";
					}  
					setTimeout ("redireccionar()", 1000); //tiempo de espera en milisegundos
					</script>
                    <?php
				}
				elseif ($rut==$verif){
					echo"Rut ya registrado ";
					?>
                    <script type="text/javascript">
					function redireccionar(){
					  window.location="./text.php?p=registro_alu";
					}  
					setTimeout ("redireccionar()", 1000); //tiempo de espera en milisegundos
					</script>
                    <?php
					
				
				}else
				{
	
			$query =  "INSERT INTO `cumbres`.`alumno` (`rut`, `nombres`, `apellido_P`, `apellido_M`, `fecha_nac`, `Domicilio`, `fecha_registro`, `Observaciones`, `foto`) VALUES ('$rut', '$nombres', '$apellidos', '$apellidos2', '$fecha', '$ciudad $direccion', SYSDATE(), ' $comentario', '$foto')";	mysql_query($query) or die(mysql_error());
			
			$query2="INSERT INTO  `cumbres`.`asig_alumno` (`idasig_alumno` ,`rut_alumno` ,`id_curso`)VALUES (NULL ,  '$rut',  '$curso')";
			mysql_query($query2) or die(mysql_error());
			
			$query3="INSERT INTO `cumbres`.`usuario` (`rut`, `usuario`, `nombre`, `apellidoP`, `apellidoM`, `email`, `fonoF`, `fonoC`, `permiso`, `password`) VALUES ( '$rut',  '$rut', '$nombres', '$apellidos', '$apellidos2', 'NULL', '111111', '111111', 'alumno', '123456');";
				mysql_query($query3) or die(mysql_error());
				
					
				mysql_close($conn);

		 
?>	
<script type="text/javascript">
function redireccionar(){
  window.location="./text.php?p=registro_alu";
}  
setTimeout ("redireccionar()", 3000); //tiempo de espera en milisegundos
</script>
<style type="text/css">
<!--
.Estilo1 {
	color: #999999;
	font-style: italic;
}
-->
</style>

 <p>&nbsp;</p>
 <p>&nbsp;</p>
        <div align="center">
          
          <p><img src="images/forms/cargando.gif" />
            
            </p>
        </div>
        <th>
        <div align="center">
		


		<span class="Estilo1">Grabando se redireccionara en 3 segundos, o Puede hacer</span> <a href="text.php?p=registro_alu">click aqui</a></div></th>
        <?php
		}
		?>