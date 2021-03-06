<?php
    session_start();
    
    if(!isset($_SESSION['cod-admi'])){
        header("Location: login.php");
    }

    require '../conexion.php';

    $errores = "";

    if(isset($_POST['insert-secre'])){
        //================================================DATOS RECIBIDOS DEL FORMULARIO============================================
        $nombre = strtolower($_POST['nombre']); 
        $apellido = strtolower($_POST['apellido']);
        $rut = $_POST['rut']; 
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contraseña1 = $_POST['contraseña1'];
        $contraseña2 = $_POST['contraseña2'];
        //          ENCRIPTACION CONTRASEÑA
        $contraseña1 = hash('sha3-512', $contraseña1);
        $contraseña2 = hash('sha3-512', $contraseña2);

        if(empty($nombre) or empty($apellido) or empty($rut) or empty($correo) or empty($telefono) or empty($contraseña1) or empty($contraseña2)){
            $errores .= "<li>Debes rellenar todos los campos.</li>";
        }
        else if($contraseña1 != $contraseña2){
            $errores .= "<li>Las contraseñas deben ser iguales.</li>";
        }
        else{
            $query = mysqli_query($mysqli, "SELECT * FROM secretaria WHERE rut_sec = '$rut' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){ //si hay registro...
                $errores .= "<li>Ya existe una secretaria con ese rut.</li>";
            }
            else{
                $query_insert = mysqli_query($mysqli, 
                    "INSERT INTO secretaria ( rut_sec, nombres_sec, apellidos_sec, correo_sec, telefono_sec, pass_sec, cod_usuario) 
                    VALUES ('$rut', '$nombre', '$apellido', '$correo', '$telefono','$contraseña1', 842)"
                );
                if($query_insert)
                    echo '<script language="javascript">alert("Usuario creado correctamente");</script>';
                else
                echo '<script language="javascript">alert("Error al crear usuario");</script>';

            }   
        }

    }
    else if(isset($_POST['insert-pro'])){
        //================================================DATOS RECIBIDOS DEL FORMULARIO============================================
        $nombre = strtolower($_POST['nombre']); 
        $apellido = strtolower($_POST['apellido']);
        $rut = $_POST['rut']; 
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $contraseña1 = $_POST['contraseña1']; 
        $contraseña2 = $_POST['contraseña2'];
        $especialidad = $_POST['especialidad'];
        //          ENCRIPTACION CONTRASEÑA
        $contraseña1 = hash('sha3-512', $contraseña1);
        $contraseña2 = hash('sha3-512', $contraseña2);

        if(empty($nombre) or empty($especialidad) or empty($apellido) or empty($rut) or empty($correo) or empty($telefono) or empty($contraseña1) or empty($contraseña2)){
            $errores .= "<li>Debes rellenar todos los campos.</li>";
        }
        else if($contraseña1 != $contraseña2){
            $errores .= "<li>Las contraseñas deben ser iguales.</li>";
        }
        else{
            $query = mysqli_query($mysqli, "SELECT * FROM profesional WHERE rut_pro = '$rut' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){ //si hay registro...
                $errores .= "<li>Ya existe un dentista con ese rut.</li>";
            }
            else{
                $query_insert = mysqli_query($mysqli, 
                    "INSERT INTO profesional ( rut_pro, nombres_pro, apellidos_pro, especialidad_pro, correo_pro, telefono_pro, pass_pro, cod_usuario) 
                    VALUES ('$rut', '$nombre', '$apellido', '$especialidad', '$correo', '$telefono','$contraseña1', 850)"
                );
                if($query_insert)
                    echo '<script language="javascript">alert("profesional creado correctamente");</script>';
                else
                    echo '<script language="javascript">alert("Error al crear usuario");</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
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

        <p>
            <a href="cerrar.php" class="btn-cerrar">Cerrar Sesión</a>
        </p>
        
        </header>
    </div>

    <div class="box-select">
        <h2>¿A Quien Desea Registrar?</h2>
        <select name="select" id="select" class="select">
            <option value="" selected disabled>Seleccione</option>
            <option value="div1">Secretaria</option>
            <option value="div2">Dentista</option>
        </select>

        <?php if(!empty($errores)):?>
            <ul class="errores">
                <?php echo $errores; ?>
            </ul>
        <?php endif;?>

    </div>





    <div id="box">
        <div id="div1" class="caja-registro">
            <form action="" method="post" class="formu-registro">

                <label for="" class="label">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ej: Rodrígo" class="input-registro">

                <label for="" class="label">Apellido: </label>
                <input type="text" name="apellido" placeholder="Ej: Perez " class="input-registro">
                    
                <label for="" class="label">Rut: </label>
                <input type="text" name="rut" placeholder="Ej: 17423911-2" id= minlength="9" maxlength="10" class="input-registro">

                <label for="" class="label">Correo electrónico: </label>
                <input type="email" name="correo" placeholder="Ej: usuario@correo.com " class="input-registro">


                <label for="" class="label">Número telefónico: </label>
                <input type="tel" name="telefono" placeholder="Ej: 91111111" minlength="9" maxlength="10" class="input-registro" >


                <label for="" class="label">Contraseña </label>
                <input type="password" name="contraseña1" placeholder="Contraseña: " class="input-registro">


                <label for="" class="label">Repetir Contraseña </label>
                <input type="password" name="contraseña2" placeholder="Contraseña: " class="input-registro">
       

                <input type="submit" name="insert-secre" value="Registrar Secretaria" class="btn-registro">
            </form>


        </div>

        <div id="div2" class="caja-registro">
            <form action="" method="post" class="formu-registro">

                <label for="" class="label">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ej: Rodrígo "class="input-registro">

                <label for="" class="label">Apellido: </label>
                <input type="text" name="apellido" placeholder="Ej: Perez "class="input-registro">
                    
                <label for="" class="label">Rut: </label>
                <input type="text" name="rut" placeholder="Ej: 17423911-2 " minlength="9" maxlength="10"class="input-registro">

                <label for="" class="label">Correo electrónico: </label>
                <input type="email" name="correo" placeholder="Ej: usuario@correo.com "class="input-registro">

                <label for="" class="label">Número telefónico: </label>
                <input type="tel" name="telefono" placeholder="Ej: 91111111 " minlength="9" maxlength="10"class="input-registro">


                <label for="" class="label">Contraseña </label>
                <input type="password" name="contraseña1" placeholder="Contraseña: "class="input-registro">


                <label for="" class="label">Repetir Contraseña </label>
                <input type="password" name="contraseña2" placeholder="Contraseña: "class="input-registro">
 

                <label for="" class="select-esp">Selecciona una Especialidad: </label>
                <select name="especialidad" id="especialidad" class="select-reg">
                    <option value="Cirujano" selected>Cirujano Dentista</option>
                    <option value="Ortodoncia">Ortodoncista</option>
                    <option value="Exodoncia">Exodoncista</option>
                    <option value="Prostodoncia">Prostodoncista</option>
                    <option value="Odontopediatra">Odontopediatra</option>
                    <option value="Periodoncia">Prostodoncista</option>
                </select>

                      
                <input type="submit" name="insert-pro" value="Registrar Dentista" class="btn-registro btn2">
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