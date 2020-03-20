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
    <h1 class="centrar-texto"> PRESUPUESTO </h1>
    <section class="contenedor">

        <form method="POST" action="">

            <fieldset class="centrar-texto">
                <Legend> PRESTASIONES </Legend>
                <label for="diente">Pieza Dental: </label>
                <select name="" id="diente">
                    <option value="">11</option>
                    <option value="">12</option>
                    <option value="">13</option>
                    <option value="">14</option>
                    <option value="">15</option>
                    <option value="">16</option>
                    <option value="">17</option>
                    <option value="">18</option>
                    <option value="" disabled>---</option>
                    <option value="">21</option>
                    <option value="">22</option>
                    <option value="">23</option>
                    <option value="">24</option>
                    <option value="">25</option>
                    <option value="">26</option>
                    <option value="">27</option>
                    <option value="">28</option>
                    <option value="" disabled>---</option>
                    <option value="">31</option>
                    <option value="">32</option>
                    <option value="">33</option>
                    <option value="">34</option>
                    <option value="">35</option>
                    <option value="">36</option>
                    <option value="">37</option>
                    <option value="">38</option>
                    <option value="" disabled>---</option>
                    <option value="">41</option>
                    <option value="">42</option>
                    <option value="">43</option>
                    <option value="">44</option>
                    <option value="">45</option>
                    <option value="">46</option>
                    <option value="">47</option>
                    <option value="">48</option>
                    
                </select>

                <label for="">Prestacion: </label>
                <select name="" id="">
                    <option value="" disabled selected>--- Seleccione ---</option>
                    <option value="">Cirugía Dental</option>
                    <option value="">Endodoncia</option>
                    <option value="">Imagenología</option>
                    <option value="">Implantología</option>
                    <option value="">Odontopediatra</option>
                    <option value="">Ortodoncia</option>
                    <option value="">Periodoncia</option>
                    <option value="">Rehabilitacion oral</option>
                </select>

                <label for="">Descripcion: </label>
                <textarea name="" id="" cols="50"></textarea>

                <label for="precio">Precio: </label>
                <input type="text" id="precio">

            </fieldset>
            <input type="submit">
            <fieldset class="centrar-texto">
                <legend>PRESUPUESTOO TOTAL</legend>


                <table>
                	<tr>
                		<td>N°</td>
                		<td>Pieza Dental</td>
                		<td>Prestacion</td>
                		<td>Descripcion</td>
                		<td>Precio</td>
                	</tr>
                </table>

                <label for="">SUMA TOTAL PRESTACIONES: </label>

            </fieldset>

        </form>

    </section>
</body>



</html>