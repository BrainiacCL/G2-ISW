<?php

include("conexion.php");
    if(isset($_GET['editar'])){
      $editar_cod_ins = $_GET['editar'];
      echo "hola";
    if(isset($_POST['actualizar'])){
      
    

    $actualizar_cod_ins = $_POST['cod_ins'];
    $actualizar_nombre_ins = $_POST['nombre_ins'];
    $actualizar_fecha_ingreso_ins = $_POST['fecha_ingreso_ins'];
    $actualizar_cantidad_ins = $_POST['cantidad_ins'];

    $actualizar = "UPDATE insumo
                   SET cod_ins = '$actualizar_cod_ins', nombre_ins = '$actualizar_nombre_ins', fecha_ingreso_ins = '$actualizar_fecha_ingreso_ins', cantidad_ins = '$actualizar_cantidad_ins'
                   WHERE cod_ins = '$editar_cod_ins'";
    $ejecutar = mysqli_query($conectar, $actualizar);

    if($ejecutar){
        echo "<script> alert('Insumo actualizados')</script>";
    }
}
  }

?>