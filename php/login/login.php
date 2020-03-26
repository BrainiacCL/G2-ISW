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
                header('Location: ../perfiles/perfilAdmin.php');
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
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="../../iconos-fontawesome/css/all.min.css">


    <style>
        #box div{
            display: none;
        }
    </style>
    <script src="../../js/jquery-3.3.1.min.js"></script>

</head>
<body>
    <div class="contenedor-logo">
        <header class="cabecera">
    
        <a href="../../index.php" class="diente-index">
            <img src="../../images/logo-login.png" alt="" width="150px">
            <figcaption class="texto-logo"> <b>Volver a Inicio</b></figcaption>
        </a>
     
        </header>
    </div>

    
    
    <div class="box-select">
        <h2>Iniciar Sesión</h2>
        <select name="select" id="select" class="select">
            <option value="" disabled selected>Seleccione un Rol</option>
            <option value="div1">Administrador</option>
            <option value="div2">Dentista</option>
            <option value="div3">Secretaria</option>
        </select>
        
        <?php if(!empty($errores)):?>
            <ul class="errores">
                <?php echo $errores; ?>
            </ul>
        <?php endif;?>
    </div>

       
    
    

    <div id="box">

        <div id="div1" class="caja">
            <h2>Administrador</h2>
            <form action="" method="post" class="formu-login">
                
                <label for="">Código de Administrador: </label>
                <input type="text" placeholder="Ej: 123456789" name="cod-admi" class="input">
                
                <label for="">Contraseña: </label>
                <input type="password" placeholder=" Contraseña" name="clave" class="input">
                
                <input type="submit" name="login-administrador" value="Iniciar Sesión" class="btn">


            </form>
        </div>


        <div id="div2" class="caja">
            <h2>Dentista</h2>
            <form action="" method="post" class="formu-login">

                <label for="">Ingrese su Rut</label>
                <input type="text" placeholder="Ej: 17452877-1" name="rut-pro" class="input">

                <label for="">Ingrese la Contraseña</label>
                <input type="password" placeholder="" name="clave" class="input">

                <input type="submit" name="login-profesional" value="Iniciar Sesión" class="btn">

            </form>

        </div>

        <div id="div3" class="caja">
            <h2>Secretaria</h2>
            <form action="" method="post" class="formu-login">

                <label for="">Ingrese su Rut</label>
                <input type="text" placeholder="Ej: 12345678-9" name="rut-secre" class="input">

                <label for="">Ingrese la Contraseña</label>
                <input type="password" placeholder="" name="clave" class="input">

                <input type="submit" name="login-secretaria" value="Iniciar Sesión" class="btn">

            </form>
        </div>

    </div>
    
</body>
</html>

<script>
    $(document).ready(function(){

    $('#select').on('change',function(){

        var selectValor = '#'+$(this).val();

        $('#box').children('div').hide();
        $('#box').children(selectValor).show();
    });

    });
</script>