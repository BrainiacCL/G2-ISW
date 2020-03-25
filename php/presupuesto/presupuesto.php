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
        echo "<script> alert('presupuesto añadido')</script>";
        echo "<script>window.open('presupuesto.php','_self')</script>";
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Presupuesto</title>
</head>

<body>
   <b> <h1 class="centrar-texto"> PRESUPUESTO </h1> </b>
    <section class="contenedor">

        <form method="POST" action="presupuesto.php">

            <fieldset class="centrar-texto">
                <Legend> PRESTACIONES </Legend>
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
                <button type="submit" name="enviar">Agregar</button>
            </fieldset>

            <fieldset class="centrar-texto">
                <legend>PRESUPUESTOO TOTAL</legend>


<div>
	           <center>    <table border="1" >
                        <thead>   
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
  				</table> </center>
</div>

				  	<?php 

				    require 'conexion.php';
				   

				    $consulta = "SELECT SUM(precio) AS Ptotal FROM presupuesto";
				    $ejecutar = mysqli_query($conectar, $consulta);

				    $fil = mysqli_fetch_array($ejecutar);
				        
					?>

					<from action="presupuesto.php" method="post">

					    <button type="submit" name="limpiar">Limpiar</button>
					
					</form>

					<div>
						<p>El presupuesto total de la consulta es: $<?php echo $fil["Ptotal"] ?></p>
					</div>

            </fieldset>

        </form>

    </section>
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

</style>