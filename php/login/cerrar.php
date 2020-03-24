<?php 
session_start();

session_destroy(); //se destruye la sesion
$_SESSION[] = array(); //limpiamos la sesion

header('Location: login.php');
// die(); 

?>