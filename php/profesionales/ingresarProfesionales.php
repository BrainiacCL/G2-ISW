<?php include("../conexion.php");

if(isset($_POST['enviar'])){
	
    $rut = $_POST['rut_pro'];
    $nombres = $_POST['nombre_pro'];
    $apellidos = $_POST['apellido_pro'];
    $especialidad = $_POST['especialidad_pro'];
    $correo = $_POST['correo_pro'];
    $telefono = $_POST['telefono'];
    $pass = $_POST['pass'];
    $tipousuario = 850;
    

    $consulta = "INSERT INTO profesional (rut_pro, nombres_pro, apellidos_pro, especialidad_pro, correo_pro, telefono_pro, pass_pro, cod_usuario) VALUES ('$rut', '$nombres', '$apellidos','$especialidad', '$correo', '$telefono', '$pass', '$tipousuario')";

    $ejecutar = mysqli_query($mysqli, $consulta);

    if($ejecutar){
        echo "<script> alert('Profesional ingresado exitosamente')</script>";
        echo "<script> window.open('vistaProfesionales.php','_self')</script>";
    }
    else{
        echo "<script> alert('No se pudo añadir profesional')</script>";
        echo "<script> window.open('vistaProfesionales.php','_self')</script>";

    }
}