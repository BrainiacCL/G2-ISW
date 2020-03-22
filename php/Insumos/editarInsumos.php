<?php include("../../conexion.php");?>


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
        echo "<script> alert('Insumo actualizados')</script>";
        echo "<script>window.open('vistaInsumos.php','_self')</script>";
    }
}
  

?>



  
        

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <title>Editar Insumos</title>
</head>
<body>
<header><nav class="navbar navbar-dark bg-dark"><a href="vistaInsumos.php" class="btn btn-primary">Volver</a>
</nav></header>
<br>
<center><h1>Editar insumo</h1></center>


<div id="formulario">
    <center><br><form action="" method="POST">
                <b><font hidden>Código:</font></b>
                <input hidden type="text" name="cod_ins" value="<?php echo $cod_ins ?>" class="form-control custom">
                <b><font>Nombre Insumo:</font></b>
                <input required type="text" name="nombre_ins" value="<?php echo $nombre_ins ?>" class="form-control custom"><br><br>
                <b><font>Fecha Ingreso:</font></b>
                <input required type="date" name="fecha_ingreso_ins" value="<?php echo $fecha_ingreso_ins ?>" class="form-control custom"><br><br>
                <b><font>Cantidad:</font></b>
                <input required type="number" name="cantidad_ins" value="<?php echo $cantidad_ins ?>" class="form-control custom"><br><br>
                <input type="submit" name="actualizar" class="btn btn-primary"><br><br></center>
          </form>    
</div>
 

          
       

        </div>

  
</body> 

}

<style>

   #formulario{
    border: 5px black solid;
    width: 500px;
    margin-left: 420px;
    border-radius: 30px;
   }
  
  .custom{
    width: 400px;
  }

</style>



</html>

