<?php include("../conexion.php");?>


   <?php if(isset($_GET['editar'])){
    $rut = $_GET['editar'];

    $consulta = "SELECT * 
                 FROM profesional
                 WHERE rut_pro = '$rut'";
    
    $ejecutar = mysqli_query($mysqli, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    
    $rut = $fila['rut_pro'];
    $nombres = $fila['nombres_pro'];
    $apellidos = $fila['apellidos_pro'];
    $especialidad = $fila['especialidad_pro'];
    $correo = $fila['correo_pro'];
    $telefono = $fila['telefono_pro'];
    $pass = $fila['pass_pro'];
    $tipo = $fila['cod_usuario'];

    }
?>


    <?php 
      if(isset($_POST['actualizar'])){
    
    $actualizar_rut = $_POST['rut_pro'];
    $actualizar_nombres = $_POST['nombre_pro'];
    $actualizar_apellidos = $_POST['apellido_pro'];
    $actualizar_especialidad = $_POST['especialidad_pro'];
    $actualizar_correo = $_POST['correo_pro'];
    $actualizar_telefono = $_POST['telefono_pro'];
    $actualizar_pass = $_POST['pass'];
    $actualizar_tipo = $_POST['tipo_usuario'];

    $actualizar = "UPDATE profesional
                   SET rut_pro = '$actualizar_rut', nombres_pro = '$actualizar_nombres', apellidos_pro = '$actualizar_apellidos', especialidad_pro = '$actualizar_especialidad', correo_pro = '$actualizar_correo', telefono_pro = '$actualizar_telefono', pass_pro = '$actualizar_pass', cod_usuario = '$actualizar_tipo'
                   WHERE rut_pro = '$rut'";
    $ejecutar = mysqli_query($mysqli, $actualizar);

    if($ejecutar){
        echo "<script> alert('Profesional Actualizado')</script>";
        echo "<script>window.open('vistaProfesionales.php','_self')</script>";
    }
}
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/estilos-intranet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    

    <title>Editar Profesional</title>

</head>

<body>


    

    <div class="row">
    <div class="barra-lateral col-2 p-0">

        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
            <li><a href="#Perfil">Perfil</a></li>
            <li><a href="../vistaInsumos.php">Insumos</a></li>
            <li><a href="vistaProfesionales.php">Profesionales</a></li>
            <li><a href="#">Prestaciones</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="../login/cerrar.php">Cerrar Sesión</a></li>
            
        

        </ul>
    </div>
   
        <div class="col-10 p-0">
            <div class="header">
                <img src="../../images/foto-perfil.png" alt="foto Perfil">
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <h1>Editar Profesional</h1>
            </div>
            <div class="container contenido-principal">
<div class="formulario">
   <br><form action="" method="POST">
                <label>Rut:</label>
                <input type="text" name="rut_pro" value="<?php echo $rut ?>" class="form-control"><br><br>
                <label>Nombres:</label>
                <input required type="text" name="nombre_pro" value="<?php echo $nombres ?>" class="form-control "><br><br>
                <label>Apellidos:</label>
                <input required type="text" name="apellido_pro" value="<?php echo $apellidos ?>" class="form-control "><br><br>
                <label>Especialidad:</label>
                <input required type="text" name="especialidad_pro" value="<?php echo $especialidad ?>" class="form-control "><br><br>
                <label>Correo:</label>
                <input required type="text" name="correo_pro" value="<?php echo $correo ?>" class="form-control "><br><br>
                <label>Teléfono:</label>
                <input required type="number" name="telefono_pro" value="<?php echo $telefono ?>" class="form-control "><br><br>
                <label>Contraseña:</label>
                <input required type="text" name="pass" value="<?php echo $pass ?>" class="form-control "><br><br>
                <label>Tipo de Usuario:</label>
                <input required type="text" name="tipo_usuario" value="<?php echo $tipo ?>" class="form-control "><br><br>
                
                
                
                <input type="submit" name="actualizar" class="btn btn-primary">
                <a href="vistaProfesionales.php" class="btn btn-danger">Cancelar</a>    <br><br>
          </form>    
</div>


</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

<style>


</style>



</html>