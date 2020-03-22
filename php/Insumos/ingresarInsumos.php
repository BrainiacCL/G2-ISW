<?php include("../../conexion.php");

if(isset($_POST['enviar'])){
	
    $nombre_ins = $_POST['nombre_ins'];
    $fecha_ingreso_ins = $_POST['fecha_ingreso_ins'];
    $cantidad_ins = $_POST['cantidad_ins'];

    $insertar = "INSERT INTO insumo (nombre_ins, fecha_ingreso_ins, cantidad_ins) VALUES ('$nombre_ins', '$fecha_ingreso_ins', '$cantidad_ins')";

    $ejecutar = mysqli_query($conectar, $insertar);

    if($ejecutar){
        echo "<script> alert('Insumo añadido')</script>";
        echo "<script> window.open('vistaInsumos.php','_self')</script>";
    }
    else{
        echo "<script> alert('No se pudo añadir el insumo')</script>";
        echo "<script> window.open('vistaInsumos.php','_self')</script>";

    }
}