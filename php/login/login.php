<?php  
    require '../conexion.php';
    $errores = "";

    if(isset($_POST['login-administrador'])){
        $cod_admi = $_POST['cod-admi'];
        $clave = $_POST['clave'];

        if(empty($cod_admi) or empty($clave))
            $errores .= "<li>Debes rellenar todos los campos.</li>";
        else{
            $query = mysqli_query($mysqli, 
            "SELECT * FROM usuario WHERE cod_usuario = '$cod_admi' AND pass_usuario = '$clave'"
            );
            $result = mysqli_num_rows($query);

            if($result > 0){
                session_start();
                $_SESSION['cod-admi'] = "Admi" ;
                header('Location: admi.php');
            }
            else{
                $errores .= "<li>Codigo de Administrado y/o Contraseña incorrectos.</li>";
            }
        }
    }
    if(isset($_POST['login-profesional'])){
        $rut_profesional = $_POST['rut-pro'];
        $clave = $_POST['clave'];
        $clave = hash('sha3-512', $clave);

        if(empty($rut_profesional) or empty($clave))
            $errores .= "Debes rellenar todos los campos.";
        else{
            $query = mysqli_query($mysqli, 
            "SELECT * FROM profesional WHERE rut_pro = '$rut_profesional' AND pass_pro = '$clave'"
            );

            $result = mysqli_num_rows($query);

            if($result > 0){
                session_start();
                $_SESSION['rut-pro'] = "Dentista" ;
                header('Location: profesional.php');
            }
            else{
                $errores .= "<li>Rut y/o Contraseña incorrectos.</li>";
            }

        }
    }
    if(isset($_POST['login-secretaria'])){
        $rut_secre = $_POST['rut-secre'];
        $clave = $_POST['clave'];
        $clave = hash('sha3-512', $clave);

        if(empty($rut_secre) or empty($clave))
            $errores .= "<li>Debes rellenar todos los campos.</li>";
        else{
            $query = mysqli_query($mysqli, 
            "SELECT * FROM secretaria WHERE rut_sec = '$rut_secre' AND pass_sec = '$clave'"
            );
            $result = mysqli_num_rows($query);

            if($result > 0){
                session_start();
                $_SESSION['rut_secre'] = "Secretaria" ;
                header('Location: secre.php');
            }else{
                $errores .= "<li>Rut y/o Contraseña incorrectos.</li>";            
            }
        }  
    
    }


?>

<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        #pai div{
            display: none;
        }
    </style>
    <script src="../../js/jquery-3.3.1.min.js"></script>

</head>
<body>

    <center><h1>Ventana de Inicio de Sesión</h1> </center>

    <h2>Usted es:</h2>
    <!-- PUEDE SER UN CHECKBOX -->
    <select name="select" id="select">
        <option value="" disabled selected>Seleccione</option>
        <option value="div1">Administrador</option>
        <option value="div2">Profesional</option>
        <option value="div3">Secretaria</option>
    </select>
    <br><br><br>

    <div id="pai">

        <div id="div1">
            <h2>Administrador</h2>
            <form action="" method="post">

                <label for="">Codigo de Administrador</label><br>
                <input type="text" placeholder="Ej: 123456789" name="cod-admi">
                <br><br>

                <label for="">Contraseña</label><br>
                <input type="password" placeholder="" name="clave">
                <br><br>

                <input type="submit" name="login-administrador" value="Iniciar Sesión">

            </form>
        </div>


        <div id="div2">
            <h2>Profesional</h2>
            <form action="" method="post">

                <label for="">Ingrese su Rut</label><br>
                <input type="text" placeholder="Ej: 17452877-1" name="rut-pro">
                <br><br>

                <label for="">Ingrese la Contraseña</label><br>
                <input type="password" placeholder="" name="clave">
                <br><br>

                <input type="submit" name="login-profesional" value="Iniciar Sesión">

            </form>
        </div>

        <div id="div3">
            <h2>Secretaria</h2>
            <form action="" method="post">

                <label for="">Ingrese su Rut</label><br>
                <input type="text" placeholder="Ej: 12345678-9" name="rut-secre">
                <br><br>

                <label for="">Ingrese la Contraseña</label><br>
                <input type="password" placeholder="" name="clave">
                <br><br>

                <input type="submit" name="login-secretaria" value="Iniciar Sesión">

            </form>
        </div>

        <?php if(!empty($errores)):?>
            <ul class="errores">
                <?php echo $errores; ?>
            </ul>
        <?php endif;?>


    </div>

    <p>
        <a href="../../index.php">Ir a inicio</a>
    </p>
    
</body>
</html>

<script>
    $(document).ready(function(){

    $('#select').on('change',function(){

        var selectValor = '#'+$(this).val();

        $('#pai').children('div').hide();
        $('#pai').children(selectValor).show();
    });

    });
</script>