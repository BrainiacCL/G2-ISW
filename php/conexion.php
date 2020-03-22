<?php
$conectar = new mysqli("localhost","root", "mysql","clinicadental");
if ($conectar->connect_errno){
    echo "Fallo al conectar con la BD: (" . $conectar->connect_errno . ") " . $conectar->connect_error;
}