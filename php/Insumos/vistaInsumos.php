<?php include("../conexion.php");?>



<?php

        if(isset($_GET['eliminar']))
        {
            $eliminar_cod_ins = $_GET['eliminar'];
            $eliminar = "DELETE FROM insumo WHERE cod_ins = '$eliminar_cod_ins'";
            $ejecutar = mysqli_query($conectar, $eliminar);

            if($ejecutar){
                echo "<script>alert('El insumo a sido eliminado')</script>";
                echo "<script>window.open('vistaInsumos.php','_self')</script>";
            }
            else{
                echo "<script>alert('No se pudo eliminar el insumo')</script>";

                echo "<script>window.open('vistaInsumos.php','_self')</script>";
            }
        }
    ?>

   <?php if(isset($_GET['editar'])){
    $editar_cod_ins = $_GET['editar'];

    $consulta = "SELECT * 
                 FROM insumo
                 WHERE cod_ins = '$editar_cod_ins'";
    
    $ejecutar = mysqli_query($conectar, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    
    $cod_ins = $fila['cod_ins'];
    $nombre_ins = $fila['nombre_ins'];
    $fecha_ingreso_ins = $fila['fecha_ingreso_ins'];
    $cantidad_ins = $fila['cantidad_ins'];

    }
?>      

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
	<title>Insumos</title>
</head>
<body>
<header><nav class="navbar navbar-dark bg-dark"></nav></header>
<br>
<div id="principal">

	<div id="izquierda">
   <form method="POST" action="">
		<table style="width: 650px;" class="table table-striped table-bordered">
		<thead class="thead-dark">
            
    		<tr>
    			<th hidden>Codigo</th>
    			<th style="width: 55px;">Nombre</th>
    			<th>Fecha Ingreso</th>
    			<th>Cantidad</th>
    			<th></th>
    		</tr>
</thead>
    		<?php
         $consulta = "SELECT * FROM insumo;";
         $ejecutar = mysqli_query($conectar, $consulta);
         $i = 0;

        while($fila = mysqli_fetch_array($ejecutar)){
            $cod_ins = $fila[0];
            $nombre_ins= $fila[1];
            $fecha_ingreso_ins = $fila[2];
            $cantidad_ins = $fila[3];
            $vectorFijo;
            
            $fecha_inicio_ordenada = $fecha_ingreso_ins;
            $nueva_fecha_inicio = date("d/m/Y", strtotime($fecha_inicio_ordenada)); 
             
            $i++;
            ?>

            <tr>
            	<td hidden><?php echo $fila[0] ?></td>
    			<td><?php echo $fila[1] ?></td>
    			<td><?php echo $nueva_fecha_inicio ?></td>
    			<td><?php echo $fila[3] ?></td>
    			<td><a href="editarInsumos.php?editar=<?php echo $cod_ins?>" class="btn btn-warning">Editar</a>
    			<a href="vistaInsumos.php?eliminar=<?php echo $cod_ins?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php
        }
    	?>

    </table>

          
    	</form> 

    	</div>

	<div id="derecha">
<form method="POST" action="ingresarInsumos.php">
<center><b><label>Nombre Insumo:</label></b>
<input type="text" name="nombre_ins" class="form-control" style="width: 500px;" placeholder="Ingrese el nombre del insumo" required><br>
<b><label>Fecha de ingreso insumo:</label></b>
<input type="date" name="fecha_ingreso_ins" class="form-control" placeholder="AAAA/MM/DD" style="width: 500px;" required><br>
<b><label>Cantidad:</label></b>
<input type="number" name="cantidad_ins" class="form-control" placeholder="Ingrese la cantidad de unidades" style="width: 500px;" required>
<br>
<input type="submit" name="enviar" value="Agregar" class="btn btn-success"></center>
</form>
	</div>
 
	
</div>

</body> 




}
<style>
	
  #principal{
  	width: 1365px;
  	height: 500px;
  	
  }

  #izquierda{
     width: 681px;
     height: 500px;
     float: left;
     padding: 20px;
  }

  #derecha{
  	width: 580px;
     height: 500px;
     float: left;
     padding: 30px;
     border-radius: 50px;
     border: 3px solid black;
     margin-left: 80px;

  }

  
  
</style>

<script>
  function vacio(idEditar){
    if(empty(idEditar)){
      <?php echo "No se a seleccionado ningun insumo para editar" ?>
    }
    else{

    }
  }
</script>

</html>

