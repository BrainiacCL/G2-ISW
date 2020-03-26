<?php include('../conexion.php');?>

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
    

    <title>Profesionales</title>

</head>

<body>


    

    <div class="row">
        <div class="barra-lateral col-2 p-0">

            <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
            <ul class="barra">
                
                <li><a href="#Perfil">Perfil</a></li>
                <li><a href="#">Insumos</a></li>
                <li><a href="../presupuesto/presupuesto.php">Presupuesto</a></li>
                <li><a href="vistaProfesionales.php">Profesionales</a></li>
                <li><a href="#">Prestaciones</a></li>
                <li><a href="#">Reservas</a></li>
                <li><a href="#">Usuarios</a></li>
            

            </ul>
        </div>
   
        <div class="col-10 p-0">
            <div class="header">
                <img src="../../images/foto-perfil.png" alt="foto Perfil">
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <h1>Profesionales</h1>
            </div>
            <div class="contenedor contenido-principal profesionales row">


                <div class="izquierda">

                    <table style=" background-color: white; box-shadow: 1px 1px 30px black;" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            
                            <tr>
                                <th>Rut</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Especialidad</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                            $consulta = "SELECT * FROM profesional;";
                            $ejecutar = mysqli_query($mysqli, $consulta);
                            $i = 1;

                            while($fila = mysqli_fetch_array($ejecutar)){
                                $rut = $fila['rut_pro'];
                                $nombres = $fila['nombres_pro'];
                                $apellidos = $fila['apellidos_pro'];
                                $especialidad = $fila['especialidad_pro'];
                                $correo = $fila['correo_pro'];
                                $telefono = $fila['telefono_pro'];
                                
                                $i++;

                        ?>

                            <tr>
                                <td><?php echo $rut ?></td>
                                <td><?php echo $nombres ?></td>
                                <td><?php echo $apellidos ?></td>
                                <td><?php echo $especialidad ?></td>
                                <td><?php echo $correo ?></td>
                                <td><?php echo $telefono ?></td>
                                <td>
                                    <a href="editarProfesional.php?editar=<?php echo $rut?>" class="btn btn-warning" >~</a>
                                    <a href="vistaProfesionales.php?eliminar=<?php echo $rut?>" class="btn btn-danger" >-</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>

                    
                

                </div><!--izquierda-->

                    <div class="derecha">
                        <h4>Registro de Profesional</h4>
                        <form method="POST" action="ingresarProfesionales.php">
                            <div class="form-group">
                                <b><label>Rut:</label></b>
                                <input type="text" name="rut_pro" class="form-control"  placeholder="Ingrese su rut" required>
                                <b><label>Nombres:</label></b>
                                <input type="text" name="nombre_pro" class="form-control" placeholder="Ingrese sus nombres" required>
                                <b><label>Apellidos:</label></b>
                                <input type="text" name="apellido_pro" class="form-control" placeholder="Ingrese sus apellidos" required>
        
                                <b><label>Especialidad:</label></b>
                                <input type="text" name="especialidad_pro" class="form-control" placeholder="Ejemplo: Dentista Cirujano..." required>
                                
                                <b><label>Correo:</label></b>
                                <input type="email" name="correo_pro" class="form-control" placeholder="Ingrese su correo" required>
                                
                                <b><label>Telefono:</label></b>
                                <input type="number" name="telefono" class="form-control" placeholder="Ingrese su Teléfono" required>
                                
                                <b><label>Contraseña:</label></b>
                                <input type="password" name="pass" class="form-control" placeholder="Ingrese contraseña" required>
                               
                            

                                <input type="submit" name="enviar" value="Enviar" class="btn btn-success">
                            </div>
                        </form>
                    </div><!--derecha-->


                </div>
                
                
            </div><!--contenido-principal-->
        </div><!--col-10-->
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

<?php

        if(isset($_GET['eliminar']))
        {
            $rut = $_GET['eliminar'];
            $eliminar = "DELETE FROM profesional WHERE rut_pro = '$rut'";
            $ejecutar = mysqli_query($mysqli, $eliminar);

            if($ejecutar){
                echo "<script>alert('El Profesional a sido eliminado')</script>";
                echo "<script>window.open('vistaProfesionales.php','_self')</script>";
            }
            else{
                echo "<script>alert('No se pudo eliminar el Profesional seleccionado')</script>";

                echo "<script>window.open('vistaProfesionales.php','_self')</script>";
            }
        }
    ?>

</html>