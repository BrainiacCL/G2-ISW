<?php
    session_start();


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
    <style>
        #pai div{
            display: none;
        }
    </style>
    <script src="../../js/jquery-3.3.1.min.js"></script>
</head>
<body>
    
    <center><h1>Ventana de admin</h1> </center>

    <h2>Elija a quien desea registrar:</h2>
    <select name="select" id="select">
        <option value="" selected disabled>Seleccione</option>
        <option value="div1">Secretaria</option>
        <option value="div2">Profesional</option>
    </select>
    <br><br><br>

    <div id="pai">
        <div id="div1">
            <form action="" method="post">
                <label for="" class="label">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ej: Rodrígo">
                <br>

                <label for="" class="label">Apellido: </label>
                <input type="text" name="apellido" placeholder="Ej: Perez ">
                <br>
                    
                <label for="" class="label">Rut: </label>
                <input type="text" name="rut" placeholder="Ej: 17423911-2" minlength="9" maxlength="10">
                <br>

                <label for="" class="label">Correo electrónico: </label>
                <input type="email" name="correo" placeholder="Ej: usuario@correo.com ">
                <br>

                <label for="" class="label">Número telefónico: </label>
                <input type="tel" name="telefono" placeholder="Ej: 91111111" minlength="9" maxlength="10">
                <br>

                <label for="" class="label">Contraseña </label>
                <input type="password" name="contraseña1" placeholder="contraseña: ">
                <br>

                <label for="" class="label">Repetir Contraseña </label>
                <input type="password" name="contraseña2" placeholder="contraseña: ">
                <br> 

                <br><br>       
                <input type="submit" name="insert-secre" value="Registrar a Secretaria">

            </form>

        </div>

        <div id="div2">
            <form action="" method="post">
                <label for="" class="label">Nombre: </label>
                <input type="text" name="nombre" placeholder="Ej: Rodrígo ">
                <br>

                <label for="" class="label">Apellido: </label>
                <input type="text" name="apellido" placeholder="Ej: Perez ">
                <br>
                    
                <label for="" class="label">Rut: </label>
                <input type="text" name="rut" placeholder="Ej: 17423911-2 " minlength="9" maxlength="10">
                <br>

                <label for="" class="label">Correo electrónico: </label>
                <input type="email" name="correo" placeholder="Ej: usuario@correo.com ">
                <br>

                <label for="" class="label">Número telefónico: </label>
                <input type="tel" name="telefono" placeholder="Ej: 91111111 " minlength="9" maxlength="10">
                <br>

                <label for="" class="label">Contraseña </label>
                <input type="password" name="contraseña1" placeholder="contraseña: ">
                <br>

                <label for="" class="label">Repetir Contraseña </label>
                <input type="password" name="contraseña2" placeholder="contraseña: ">
                <br> 

                <br><br>
                <label for="">Selecciona una Especialidad: </label>
                <br>
                <select name="especialidad" id="especialidad">
                    <option value="Cirujano" selected>Cirujano Dentista</option>
                    <option value="Ortodoncia">Ortodoncista</option>
                    <option value="Exodoncia">Exodoncista</option>
                    <option value="Prostodoncia">Prostodoncista</option>
                    <option value="Odontopediatra">Odontopediatra</option>
                    <option value="Periodoncia">Prostodoncista</option>
                </select>

                <br><br>       
                <input type="submit" name="insert-pro" value="Registrar a Profesional">
            </form>
        </div>

        <?php if(!empty($errores)):?>
            <ul class="errores">
                <?php echo $errores; ?>
            </ul>
        <?php endif;?>
        
        
        <p>

            <a href="login.php" class="link">Ir al login</a>
        </p>
        <p>
        <a href="cerrar.php">Cerrar Sesión</a>
    </p>
        
    </div>
    
    
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