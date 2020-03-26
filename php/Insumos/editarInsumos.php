<?php include("conexion.php");?>


   <?php if(isset($_GET['editar'])){
    $editar_cod_ins = $_GET['editar'];

    $consulta = "SELECT * 
                 FROM insumo
                 WHERE cod_ins = '$editar_cod_ins'";
    
    $ejecutar = mysqli_query($conectar, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    
    $cod_ins = $fila['cod_ins'];
    $nombre_ins = $fila['nombre_ins'];
    $fecha_ingreso_ins = $fila['fecha_ingreso_ins'];
    $cantidad_ins = $fila['cantidad_ins'];

    }
?>


    <?php 
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
        echo "<script> alert('Insumo actualizado')</script>";
        echo "<script>window.open('vistaInsumos.php','_self')</script>";
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
    <link rel="stylesheet" href="../../css/all.min.css">
    

<<<<<<< HEAD
    <title>Editar Insumo</title>
=======
    <title class="centrar-texto">Editar Insumo</title>
>>>>>>> 1d363e3dcccb25a6e63d7612534f42c8e374b0b0

</head>

<body>


    

    <div class="row">
    <div class="barra-lateral col-2 p-0">

        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
<<<<<<< HEAD
            <li><a href="#Perfil">Perfil</a></li>
            <li><a href="vistaInsumos.php">Insumos</a></li>
            <li><a href="#">Profesionales</a></li>
            <li><a href="#">Prestaciones</a></li>
=======
            <li><a href="../perfiles/perfilAdmin">Perfil</a></li>
            <li><a href="vistaInsumos.php">Insumos</a></li>
            <li><a href="">Profesionales</a></li>
            <li><a href="../presupuesto/presupuesto.php">Presupuesto</a></li>
>>>>>>> 1d363e3dcccb25a6e63d7612534f42c8e374b0b0
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Usuarios</a></li>
        

        </ul>
    </div>
   
        <div class="col-10 p-0">
            <div class="header">
<<<<<<< HEAD
                <img src="../../images/foto-perfil.png" alt="foto Perfil">
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <center><h1>Editar insumo</h1></center>
            </div>
            <div class="container contenido-principal">
=======
             <a href="../perfiles/perfilAdmin"> <img src="../../images/foto-perfil.png" alt="foto Perfil"> </a>
                <p>Nombre Usuario</p>
            </div>
            
            <div class="contenedor contenido-principal ">

                <div class="titulo">
                <h1 class="centrar-texto">Editar insumo</h1>
            </div>
>>>>>>> 1d363e3dcccb25a6e63d7612534f42c8e374b0b0
<div id="formulario">
   <br><form action="" method="POST">
                 <center><b><font hidden>Código:</font></b>
                <input hidden type="text" name="cod_ins" value="<?php echo $cod_ins ?>" class="form-control custom">
                <b><font>Nombre Insumo:</font></b>
                <input required type="text" name="nombre_ins" value="<?php echo $nombre_ins ?>" class="form-control custom"><br><br>
                <b><font>Fecha Ingreso:</font></b>
                <input required type="date" name="fecha_ingreso_ins" value="<?php echo $fecha_ingreso_ins ?>" class="form-control custom"><br><br>
                <b><font>Cantidad:</font></b>
                <input required type="number" name="cantidad_ins" value="<?php echo $cantidad_ins ?>" class="form-control custom"><br><br>
                <input type="submit" name="actualizar" class="btn btn-primary">
                <a href="vistaInsumos.php" class="btn btn-danger">Cancelar</a></center>    <br><br>
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
    <script src="../../js/intranet.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

<style>

   #formulario{
    width: 400px;
    margin-left: 350px;
    background-color: white;
     border: 3px solid black;
     background-color: white;
     box-shadow: 1px 1px 30px black;

   }
  
  .custom{
    width: 250px;
  }

</style>



</html>