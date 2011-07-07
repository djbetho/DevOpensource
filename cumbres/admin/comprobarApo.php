<?php 
$hostname_conn = "localhost";
$database_conn = "cumbres";
$username_conn = "root";
$password_conn = "";
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 

$colname_rs_user = "-1";
if (isset($_POST['username'])) {
  $colname_rs_user = $_POST['username'];
}
mysql_select_db($database_conn, $conn);
$query_rs_user = sprintf("SELECT * FROM apoderado WHERE rut = '%s'",$colname_rs_user);
$rs_user = mysql_query($query_rs_user, $conn) or die(mysql_error());
$row_rs_user = mysql_fetch_assoc($rs_user);
$totalRows_rs_user = mysql_num_rows($rs_user);


if($totalRows_rs_user == 0)
{
	echo '<div align="center" class="ok">Rut no Registrado';
	
	
}
else{
	echo '<div align="center" class="error">Rut ya registrado';
}
?>
<?php 
mysql_free_result($rs_user);
?>