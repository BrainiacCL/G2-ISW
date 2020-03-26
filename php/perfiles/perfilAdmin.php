<?php include('../conexion.php');
    session_start();

    if(!isset($_SESSION['cod-admi'])){
        header("Location: login.php");
    }

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/estilos-intranet.css">
    

    <title>Intranet</title>

</head>

<body>


    

    <div class="row">
   	 <div class="barra-lateral col-2 p-0">

        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
            <li><a href="../perfiles/perfilProfesional.php">Perfil</a></li>
            <li><a href="../insumos/vistaInsumos.php">Insumos</a></li>
            <li><a href="../profesionales/vistaProfesionales.php">Profesionales</a></li>
            <li><a href="../presupuesto/presupuesto.php">Presupuesto</a></li>
            <li><a href="./vistaintranet/reserva.php">Reservas</a></li>
            <li><a href="../login/cerrar.php">Cerrar Sesíon</a></li>
        

        </ul>
    	</div>
   
        <div class="col-10 p-0">
            <div class="header">
                <img src="../../images/foto-perfil.png" alt="foto Perfil">
                <?php
                
               
                echo "<p>".$_SESSION['cod-admi']."</p>"
                ?>
            </div>
            <div class="titulo centrar-texto">
                <h1>Bienvenido</h1>
                <?php echo "<p>".$_SESSION['cod-admi']."</p>" ?>
            </div>

          
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

</html>