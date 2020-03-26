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
    if(isset($_POST['enviar'])){
        $cuerpo = '
        <!DOCTYPE html>
        <html>
        <head>
         <title></title>
        </head>
        <body>
        Un dentista a solicitado la compra de '.$_POST['nombre_ins'].'. <br>
        Cantidad solicitada: '.$_POST['cantidad_pedido'].' 
        </body>
        </html>';



        //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección del remitente
        $headers .= "From: ".$_POST['nombre']." <".$_POST['emisor'].">\r\n";

        //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$_POST['emisor']."\r\n";

        if(mail($_POST['receptor'],$_POST['asunto'],$cuerpo,$headers)){
        echo "<script>alert('Pedido enviado al correo.');</script>";
        echo "<script>window.open('vistaInsumos.php','_self')</script>"; 

      }else{
        echo "<script>alert('No se pudo enviar el mail.');</script>";
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
    

    <title>Pedir Insumo</title>

</head>

<body>


    

    <div class="row">
    <div class="barra-lateral col-2 p-0">

<<<<<<< HEAD
        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
            <li><a href="#Perfil">Perfil</a></li>
            <li><a href="vistaInsumos.php">Insumos</a></li>
            <li><a href="#">Profesionales</a></li>
            <li><a href="#">Prestaciones</a></li>
=======
        <a href=""><img src="../../images/logo-intranet.png" alt="Logo intranet" ></a>
        <ul class="barra">
            
            <li><a href="../perfiles/PerfilAdmin.php">Perfil</a></li>
            <li><a href="vistaInsumos.php">Insumos</a></li>
            <li><a href="#">Profesionales</a></li>
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
=======
               <a href="../perfiles/perfilAdmin">  <img src="../../images/foto-perfil.png" alt="foto Perfil"> </a>
>>>>>>> 1d363e3dcccb25a6e63d7612534f42c8e374b0b0
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <center><h1>Pedir insumo</h1></center>
            </div>
            <div class="container contenido-principal">

              <div id="formularioPedido">
    <center><form action="" method="POST">
      <br>  

        <?php 
        date_default_timezone_set("America/Santiago");
        $fechaHoy = date("d/m/Y");
            
             ?>

            <font hidden>Asunto:</font>
            <input hidden type="text" size="55" name="asunto" value="Pedido <?php echo $fechaHoy ?>">
            <font hidden>Nombre</font>        
            <input hidden type="text" size="25" name="nombre" value="Dentista">
            <font hidden>E-mail Emitente</font>
            <input hidden type="email" size="25" name="emisor" value="naachorv11@gmail.com">
            <font hidden>Email Receptor</font>
            <input hidden type="text" size="55" name="receptor" value="ignacio.rodriguez1501@alumnos.ubiobio.cl">
            <font hidden>Código Insumo:</font>
            <input hidden required type="text" name="cod_ins" value="<?php echo $cod_ins ?>" class="form-control custom"><br>
            <b><font>Nombre Insumo:</font></b><br>
            <input readonly type="text" name="nombre_ins" value="<?php echo $nombre_ins ?>" class="form-control custom">
            <label><b>Cantidad:</b></label><br>
            <input name="cantidad_pedido" type="number" placeholder="Cantidad a pedir" class="form-control custom"><br>
            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
            <a href="vistaInsumos.php" class="btn btn-danger">Cancelar</a></center>    <br><br>
            </form>    
            
</div>
                
<br>
                          


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
    #formularioPedido{
        border: 3px black solid;
    width: 400px;
    margin-left: 360px;
    background-color: white;
     border: 3px solid black;
     box-shadow: 1px 1px 30px black;
    }

    .custom{
        width: 250px;
    }
</style>

</html>