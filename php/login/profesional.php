<?php
    session_start();

    if(!isset($_SESSION['rut-pro'])){
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
    <h1>Bienvenid@: <?php echo $_SESSION['rut-pro']; ?></h1>

    <p>
        <a href="cerrar.php">Cerrar Sesión</a>
    </p>
    
</body>
</html>