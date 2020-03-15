<?php include('php/conexion.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
  } );
  </script>
    <title>Inicio</title>
</head>
<body>
    <header>
    <div class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <div class="contenedor">
                    <nav class="navegacion-principal">
                        <a href="nosotros.html" class="link">Nosotros</a>
                        <a href=planes.php" class="link">Nuestros Planes</a>
                        <a href="contacto.php" class="link">Contáctanos</a>
                    </nav>
                </div><!--contenedor-->
            </div><!--contenido-header-->
            <div class="contendor contenido-principal row">
                <h1 class="slogan-principal fw-700">Profesionalismo, Confianza y Gentileza</h1>
            
                <div class="contenido-reserva">
                    <h1 class="centrar-texto fw-300 titulo-reserva">Reservar Hora</h1>
                    <div class="formulario form-group">
                        <form method="POST" action="reservar.php">
           
                            <label class="label-reserva">Ingrese su rut</label>
                            <input class="form-control" type="text">
                            
                            <label class="label-reserva">Eliga especialidad</label><br>
                            <select class="form-control" name="especialidades">
                
                                <option>Odontologia General</option>
                                <option>Odontologia Infantil</option>
                                <option>Ortodoncia</option>
                                <option>Endodoncia</option>
                                <option>Implantes</option>
                                <option>Cirugía</option>
                            </select>
                            
                            <label class="label-reserva">Elija Prestación</label><br>
                            
                            <select class="form-control" name="prestaciones">
                                <option>Atención Tratamiento</option>
                                <option>Revisión Anual</option>
                                <option>Examen Inicial</option>
                                <option>Control Post-Tratamiento</option>
                            </select> 
                          
                                
                            <label class="label-reserva">Profesional</label>
                            <select class="form-control" name="profesionales">
                                <?php
                                    $profesionales = "SELECT * FROM profesional";
                                    $resultado = mysqli_query($mysqli, $profesionales);
                
                                    while($row = $resultado->fetch_assoc()){
                                        echo "<option value=" . $row['rut_pro'] ." >". $row['nombres_pro'] . "</option>";
                                                
                                    }
                                        
                                ?>
                                    
                            </select>                                          
                
                            
                                            
                           <label class="label-reserva">Elija el día:</label>  
                           <input class="form-control" type="text" id="datepicker">
                           
                            <?php 
                                $horas = array("10:00", "10:30", "11:00", "11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00");
                            ?>
                            <label class="label-reserva">Elija la hora</label>
                            <select class="form-control" name="horas-disponibles" id="">
                                <?php
                                    foreach ($horas as $hora) {
                                ?>
                                <option><?php echo $hora; ?></option>

                                <?php 
                                    } 
                                ?>
                            </select>
    
                          
                            <input class="boton" type="submit" value="Reservar">                                                   
            
                                
                            
                        </form>
                    </div><!--Formulario-->
                </div><!--contenido-principal-->
            </div><!--texto-principal-->
        </div><!--hero-->
    </div><!--site-header-->
   
    
</header>   

</body>

</html>

  