<?php include("conexion.php");?>



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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/estilos-intranet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../../js/intranet.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Insumos</title>

</head>

<body>


    

    <div class="row">
    <div class="barra-lateral col-2 p-0">

        <a href="#"><img src="../../images/logo-intranet.png" alt="Logo intranet"></a>
        <ul class="barra">
            
            <li><a href="../perfiles/perfilAdmin.php">Perfil</a></li>
            <li><a href="vistaInsumos.php">Insumos</a></li>
            <li><a href="../perfiles/vistaProfesionales.php">Profesionales</a></li>
            <li><a href="../presupuesto/presupuesto.php">Presupuesto</a></li>
            <li><a href="#">Reservas</a></li>
            <li><a href="#">Usuarios</a></li>
            <li><a href="../login/cerrar.php">Cerrar Sesíon</a></li>
        

        </ul>
    </div>
   
        <div class="col-10 p-0">
            <div class="header">
             <a href="../perfiles/perfilAdmin">    <img src="../../images/foto-perfil.png" alt="foto Perfil"> </a>
                <p>Nombre Usuario</p>
            </div>
            <div class="titulo">
                <h1>Insumos</h1>
            </div>
            <div class="contenedor contenido-principal">

        <div id="principal">

	<div id="izquierda">
   <form method="POST" action="">
		<table style="width: 450px; background-color: white; box-shadow: 1px 1px 30px black;" class="table table-striped table-bordered">
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
    			<td style="width: 100px;"><?php echo $fila[1] ?></td>
    			<td style="width: 100px;"><?php echo $nueva_fecha_inicio ?></td>
    			<td style="width: 100px;"><?php echo $fila[3] ?></td>
    			<td style="width: 200px;"><a href="vistaPedido.php?editar=<?php echo $cod_ins ?>" class="btn btn-primary" title="Pedir insumo">Pedir</a>
            <a href="editarInsumos.php?editar=<?php echo $cod_ins?>" class="btn btn-warning" title="Editar">Editar</a>
    			<a href="vistaInsumos.php?eliminar=<?php echo $cod_ins?>" class="btn btn-danger" title="Eliminar">Eliminar</a></td>
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
<input type="text" name="nombre_ins" class="form-control custom"  placeholder="Ingrese el nombre del insumo" required><br>
<b><label>Fecha de ingreso insumo:</label></b>
<input type="date" name="fecha_ingreso_ins" class="form-control custom" placeholder="AAAA/MM/DD" required><br>
<b><label>Cantidad:</label></b>
<input type="number" name="cantidad_ins" class="form-control custom" placeholder="Ingrese la cantidad de unidades" required>
<br>
<input type="submit" name="enviar" value="Agregar" class="btn btn-success"></center>
</form>
	</div>

	
</div>



</div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    
</body>

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
  	width: 380px;
     height: 370px;
     float: left;
     padding: 30px;;
     border: 3px solid black;
     background-color: white;
     box-shadow: 1px 1px 30px black;

  }

  #pedirInsumo{
    width: 500px;
    height: 300px;
    border: 1px solid black;
    margin-left: 450px;
  }

.custom{
	width: 250px;
}
  
  
</style>

</html>