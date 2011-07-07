<?php 
include('databaseConnection.php');
?>


	
				
                
                <th><select name="id_curso" size="1" id="id_curso">
        <?php
		$sql=mysql_query("SELECT id,nombre FROM asignatura",$conn);
		while($rs=mysql_fetch_array($sql))
			{
  				$options=$rs['nombre'];
				$id = $rs['id'];
	?>
        <option value="<?php echo"$id"; ?>"><?php echo"$options"; ?></option>
        <?php
	  }
	  ?>
      </select></th>
                
                