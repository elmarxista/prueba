<?php

include_once('clases/Seguridad.php');

$a = new Seguridad();

$a->chekear_session();

?>

<?php
  include("db.php");  

	$id =$_REQUEST['codigo'];
	
	
	// sending query
	mysql_query("DELETE FROM mrh_turnos WHERE codigo = '$id'")
	or die(mysql_error());  	
	
	header("Location: turnos_ver.php");
?>
