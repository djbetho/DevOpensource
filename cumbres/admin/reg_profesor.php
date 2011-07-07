<?php

include('databaseConnection.php');
	mysql_query("SET NAMES 'utf8'");
 $rut=$_POST["txt_username"];
  $nombres=$_POST["nombres"];
   $apellidos=$_POST["apellidos"];
   $apellidos2=$_POST["apellidos2"];
    $ciudad=$_POST["ciudad"];
	 $direccion=$_POST["direccion"];
	  $fecha=$_POST["fecha"];
	   $comentario=$_POST["comentario"];
	    $foto=$_POST["foto"];
		 $curso=$_POST["id_curso"];

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
	$query="INSERT INTO  `cumbres`.`profesor` (`rut`, `nombres`, `apellido_P`, `apellido_M`, `fecha_nac`, `domicilio`, `foto`)VALUES ('$rut', '$nombres','$apellidos', '$apellidos2', '$fecha', '$ciudad $direccion',  '$foto');";
	mysql_query($query) or die(mysql_error());
			
			
			
			$query3="INSERT INTO `cumbres`.`usuario` (`rut`, `usuario`, `nombre`, `apellidoP`, `apellidoM`, `email`, `fonoF`, `fonoC`, `permiso`, `password`) VALUES ( '$rut',  '$rut', '$nombres', '$apellidos', '$apellidos2', 'NULL', '111111', '111111', 'profesor', '123456');";
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