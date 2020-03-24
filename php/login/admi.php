<?php
    session_start();
    
    if(!isset($_SESSION['cod-admi'])){
        header("Location: login.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenid@: <?php echo $_SESSION['cod-admi']; ?> </h1>

    <p>
        <a href="registro.php">Registrar un usuario</a>
    </p>

    <p>
        <a href="cerrar.php">Cerrar Sesión</a>
    </p>
</body>
</html>