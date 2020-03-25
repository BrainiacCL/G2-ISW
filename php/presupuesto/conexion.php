<?php
	
	$conectar = new mysqli('localhost', 'root', '', 'clinicadental_sql');
	
	if($conectar->connect_error){
		
		die('Error en la conexion' . $conectar->connect_error);
		
	}
?>