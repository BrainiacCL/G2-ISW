<?php
	require 'conexion.php';

if(isset($_POST['enviar'])){
    $diente = $_POST['diente'];
    $prestaciones = $_POST['prestaciones'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];


    $insertar = "INSERT INTO presupuesto (descripcion, precio, id_diente, id_prestaciones) VALUES ('$descripcion', '$precio', '$diente', '$prestaciones')";

    $ejecutar = mysqli_query($conectar, $insertar);

    if($ejecutar){
        echo "<script> alert('Presupuesto Añadido')</script>";
    }
    else{
        echo "<script> alert('No se pudo añadir el presupuesto, intente llenar todos los espacios.')</script>";
    }
}

?>

    <?php
require 'conexion.php';
if(isset($_POST['limpiar'])) {

    $sql = "TRUNCATE TABLE presupuesto";

    $ejecutar = mysqli_query($conectar, $sql);

    $conectar->close();
}
    ?>


<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/estilos-intranet.css"> 
    <link rel="stylesheet" href="../../css/normalize.css">
    <title>Intranet</title>

</head>

<body>

    <div class="row">
    <div class="barra-lateral col-2 p-0">

        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
            <li><a href="../perfiles/perfilAdmin.php">Perfil</a></li>
            <li><a href="../Insumos/vistaInsumos.php">Insumos</a></li>
            <li><a href="../perfiles/vistaProfesionales.php">Profesionales</a></li>
            <li><a href="#">Prestaciones</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Usuarios</a></li>
        

        </ul>
    </div>
   
        <div class="col-10 p-0">
            <div class="header">
               <a href="../perfiles/perfilAdmin">  <img src="../../images/foto-perfil.png" alt="foto Perfil"> </a>
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <h1>Presupuesto</h1>
            </div>
            <div class="contenedor contenido-principal ">

                
                <div class="derecha">
        <form method="POST" action="presupuesto.php">

            <fieldset class="centrar-texto">
                <label for="">Pieza Dental: </label>  
    <?php 
    require 'conexion.php';
    echo '<select required name="diente">';
    echo '<option value="0" disabled selected>Seleccione</option>';
    $queryD = "SELECT *
                            FROM diente D";
    $ejecutar = mysqli_query($conectar, $queryD);

    while($fila = mysqli_fetch_array($ejecutar)){
    	echo '<option value="'.$fila['id_diente'].'">'.$fila['nombre'].'</option>';
    }
    echo '</select>';
    ?>

                <label for="prestaciones">Prestacion: </label>
    <?php 
    require 'conexion.php';

    echo '<select required name="prestaciones" >';
    echo '<option value="0" disabled selected>Seleccione</option>';
    $queryD = "SELECT *
                            FROM prestaciones D";
    $ejecutar = mysqli_query($conectar, $queryD);

    while($fila = mysqli_fetch_array($ejecutar)){
    	echo '<option value="'.$fila['id_prestaciones'].'">'.$fila['nombre'].'</option>';
    }
    echo '</select>';
    ?>

                <label for="">Descripcion: </label>
                <textarea  name="descripcion" id="" cols="50"></textarea> <br> <br>

                <label for="precio">Precio: </label>
                <input type="text" name="precio" id="precio"> <br> <br>
                <button type="submit" name="enviar" class="btn btn-success">Agregar</button>
            </fieldset>
            </div>



            <div class="izquierda">
            <fieldset class="centrar-texto">

            <div>
	          <table style="width: 450px; background-color: white; box-shadow: 1px 1px 30px black;" class="table table-striped table-bordered">
                        <thead class="thead-dark">   
                            <tr>
                                <th>ID</th>
                                <th>N Pieza Dental</th>
                                <th>Prestacion</th>
								<th>Descripcion</th>
                                <th>Precio</th>
                        </thead>
                        <?php
                        $consulta = "SELECT P.id_presupuesto, D.nombre, PR.nombre, P.descripcion,P.precio 
                        FROM presupuesto P, diente D, prestaciones PR
                        WHERE P.id_prestaciones = PR.id_prestaciones AND 
                        P.id_diente = D.id_diente ;";
                        $ejecutar = mysqli_query($conectar, $consulta);
                        $i = 0;

                        while ($fila = mysqli_fetch_array($ejecutar)){
                            $id_presupuesto = $fila[0];
                            $descripcion= $fila[3];
                            $precio = $fila[4];
                            $id_diente = $fila[1];
                            $id_prestaciones= $fila[2];
                            $i++;
                            ?>

                            <tr>
                                <td><?php echo $id_presupuesto ?></td>
                                <td><?php echo $id_diente ?></td>
                                <td><?php echo $id_prestaciones ?></td>
                                <td><?php echo $descripcion ?></td>
                                <td><?php echo $precio ?></td>                     
                            </tr>
                            <?php
                        }
                        ?>
  				</table> 
                <button type="submit" name="limpiar" class="btn btn-warning">Limpiar</button>
                <div class="centrar-texto">
                        <?php 

                    require 'conexion.php';
                   

                    $consulta = "SELECT SUM(precio) AS Ptotal FROM presupuesto";
                    $ejecutar = mysqli_query($conectar, $consulta);

                    $fil = mysqli_fetch_array($ejecutar);
                        
                    ?>
                       <b><p>El presupuesto total de la consulta es: $<?php echo $fil["Ptotal"] ?></p></b> 

                    <a href="pdf.php">Generar PDF</a>
                    </div>
            </div>


            </fieldset>
            </div>
            </div>
                        
        </form>

    </section>
     
            </div>
        </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>

<style>
input[type=text], textarea{
    padding: 4px 2px; 
    border: 1px solid #aaa;
    background: #fff;
    resize: none;
    vertical-align:top;
}

.contenedor {
    max-width: 1200px; /** =1200px **/
    margin: 0 auto;
}

.centrar-texto{
    text-align: center;
    text-transform: uppercase;
}
.izquierda{
     width: 500px;
     height: 330px;
     float: left;
     padding: 20px;
     margin-bottom: 5px;
     margin-left: 10px
  }

.derecha{
    width: 650px;
     height: 330px;
     float: left;
     padding: 30px;;
     border: 1px solid black;
     background-color: white;
     box-shadow: 1px 1px 30px black;
     margin-bottom: 25px;

}

</style>