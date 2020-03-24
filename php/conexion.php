<?php
$mysqli = new mysqli("localhost","root", "","clinicadental");
if ($mysqli->connect_errno){
    echo "Fallo al conectar con la BD: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}