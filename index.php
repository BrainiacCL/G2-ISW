<?php include('php/conexion.php')?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Clinica Dental </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 


    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <!-- link de íconos de Font Awesome -->
    <script src="https://kit.fontawesome.com/6999d3054e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
  } );
  </script>

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white" >

      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.html">Clinica Dental</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">

                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      
                      </li>
                      <li><a href="#nosotros">Nosotros</a></li>
                      <li><a href="#servicios">Servicios</a></li>
                      <!-- <li><a href="#resenas">Reseñas</a></li> -->                     
                      <li><a href="#contacto">Contacto</a></li>
                 
                                   
                          <li class="bg-transparent hover:bg-blue-500   font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" target="" ><a href="#">Ingresar</a></li>
         

                      



                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="slide-one-item home-slider owl-carousel position-relative ">


       
                    
                             



      <div class="site-blocks-cover overlay " style="background-image: url('images/diente_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" >
        <div class="container">
          <div class="row align-items-center justify-content-end">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Tu sonrisa en manos de los mejores</h2>
              <h1 class="">Clinica Dental <br></h1>

            </div>
          </div>
        </div>
      </div>

      

      <div class="site-blocks-cover overlay " style="background-image: url('images/diente_2.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-end">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Expresa tu alegría</h2>
              <h1 class="">Con una sonrisa</h1>
            </div>
          </div>
        </div>
      </div>
        
      <div class="site-blocks-cover overlay " style="background-image: url('images/diente_3.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-end">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">brayan Aqui </h2>
              <h1 class="">LLego tu tiburon !!</h1>
            </div>
          </div>
        </div>
      </div>
      <div class=" container-fluid contenido-reserva" id="cajetinReserva">
                    <h1 class="centrar-texto fw-300 titulo-reserva position-absolute">Reservar Hora</h1>
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

    </div>
    </div>
   

    
    <div class="site-block-half d-flex" id="nosotros">
      <div class="image bg-image" style="background-image: url('images/hero_3.jpg');"></div>
      <div class="text">
        <h2 class="font-family-serif">Bienvenidos</h2>
        <span class="caption d-block text-primary pl-0 mb-4">Dra.Elsa Pulido</span>
        <p class="mb-5">Con años de experiencia en la salud dental, Contamos con una variedad de  profesionales de la odontología quienes ponen sus servicios y equipo de trabajo a tu disposición para cuidar de aquello que más quieres: tu sonrisa.</p>
        <p><a href="#servicios" class="btn btn-primary pill px-4 py-3 text-white">Ver más</a></p>

      </div>
    </div>

    <div class="site-blocks-cover overlay" style="background-image: url('images/diente_4.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h2 class="caption mb-2">Expresa tu alegría</h2>
              <h1 class="">Con una sonrisa</h1>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Comprometidos contigo</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="display-3 mb-3 d-block text-primary"><i class="fa fa-user-md"></i></span>
              <h2 class="h5">Profesionalismo</h2>
              <p>Confía en nosotros, Nuestros años de experiencia nos respaldan.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="display-3 mb-3 d-block text-primary"><i class="fas fa-tooth"></i></span>
              <h2 class="h5">Calidad</h2>
              <p>Brindamos atención con los más altos estándares de calidad en nuestro servicio.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="display-3 mb-3 d-block text-primary"><i class="fas fa-credit-card"></i></span>
              <h2 class="h5">Facilidades de pago</h2>
              <p>Contamos con una variedad  de medios de pagos .</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="text-center item">
              <span class="display-3 mb-3 d-block text-primary"><i class="fas fa-hand-holding-usd"></i></span>
              <h2 class="h5">Garantía</h2>
              <p>Te ofrecemos garantía en tus tratamientos.</p>
            </div>
          </div>


        </div>
      </div>
    </div>


    <div class="site-section bg-light" id="servicios">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">Servicios</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image order-md-2" style="background-image: url('https://images.unsplash.com/photo-1561328399-f94d2ce78679?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5 order-md-1">
                <h2 class="font-family-serif h4 mb-3">Limpiezas</h2>
                <p>Por muy bien que te cepilles los dientes o uses el hilo dental, siempre quedan zonas difíciles de alcanzar. Para reducir el riesgo de enfermedad gingival, realízate una limpieza dental y consigue que tus dientes estén realmente limpios.</p>
                <p><a href="https://calendly.com/clinicadental/limpieza" class="btn btn-primary pill px-4 py-2 text-white" target="_blank">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image" style="background-image: url('https://images.unsplash.com/photo-1473232117216-c950d4ef2e14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5">
                <h2 class="font-family-serif h4 mb-3">Ortodoncia</h2>
                <p>La ortodoncia permite tener una boca sana, una sonrisa estética y unos dientes alineados que, cuidándolos, con mayor probabilidad van a durar mucho más tiempo. La corrección evita la mala alineación o apiñamiento de dientes, la mala posición de la dentadura o el desplazamiento dental.</p>

                <p><a href="https://calendly.com/clinicadental/ortodoncia" class="btn btn-primary pill px-4 py-2 text-white" target="_blank">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image order-md-2" style="background-image: url('https://images.unsplash.com/photo-1486049252259-45184399c5b2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5 order-md-1">
                <h2 class="font-family-serif h4 mb-3">Endodoncia</h2>
                <p>Para salvar un diente dañado siempre que sea posible, los dentistas recurren a la endodoncia,un procedimiento que trata el interior del diente y permite mantener la dentición natural, el hueso y la encía que le rodean, así como su funcionalidad.</p>

                <p><a href="https://calendly.com/clinicadental/endodoncia" class="btn btn-primary pill px-4 py-2 text-white" target="_blank">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image" style="background-image: url('https://images.unsplash.com/photo-1445527815219-ecbfec67492e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5">
                <h2 class="font-family-serif h4 mb-3">Cirugías</h2>
                <p>La cirugía oral puede ser necesaria por tener un diente traumatizado atrapado en la mandíbula o un diente que está mal posicionado y daña al diente de al lado. La cirugía oral también es necesaria para colocar implantes dentales y para algunos tipos de tratamientos en las encías.</p>

                <p><a href="https://calendly.com/clinicadental/ortodoncia" class="btn btn-primary pill px-4 py-2 text-white" target="_blank">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>

      <!--  <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image order-md-2" style="background-image: url('https://images.unsplash.com/photo-1564420159030-ad05d6fbc24e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5">
                <h2 class="font-family-serif h4 mb-3">Invisalign</h2>
                <p>Los alineadores transparentes, también conocido como tratamiento Invisaling, es un dispositivos de ortodoncia que tiene una forma plástica transparente de aparatos dentales utilizados para ajustar los dientes. sin dolor y de una manera más rapida y efectiva.</p>

                <p><a href="#contacto" class="btn btn-primary pill px-4 py-2 text-white">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="site-block-half d-flex">
              <div class="image bg-image" style="background-image: url('https://images.unsplash.com/photo-1468493858157-0da44aaf1d13?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');"></div>
              <div class="text py-5">
                <h2 class="font-family-serif h4 mb-3">Prótesis</h2>
                <p>Una prótesis dental es un elemento artificial destinado a restaurar la anatomía de una o varias piezas dentarias y estas pueden ser fijas o removibles.</p>

                <p><a href="#contacto" class="btn btn-primary pill px-4 py-2 text-white">Agendar cita</a></p>

              </div>
            </div>
          </div>
        </div>-->

      </div>
    </div>

    <!--<!-- <div class="site-section block-14" id="resenas">--

      <div class="container">

        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Reseñas</h2>
          </div>
        </div>

        <div class="nonloop-block-14 owl-carousel">

          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Katie Johnson</h2>
                <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Jane Mars</h2>
                <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Shane Holmes</h2>
                <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>
              </div>
            </div>
          </div>
          <div class="p-4">
            <div class="d-flex block-testimony">
              <div class="person mr-3">
                <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded">
              </div>
              <div>
                <h2 class="h5">Mark Johnson</h2>
                <blockquote>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias accusantium qui optio, possimus necessitatibus voluptate aliquam velit nostrum tempora ipsam!&rdquo;</blockquote>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div> -->


    <div class="py-5 quick-contact-info" id="contacto" >
      <div class="container">

        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Contacto</h2>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4 text-center">
            <div>
              <a href="#" data-toggle="modal" data-target="#mapaModal" class="sin-linea-azul">
                <span class="icon-room text-white h2 d-block"></span>
              </a>
              <h2>Ubicación</h2>
              <p class="mb-0">Concepcion <br>#420 San Martin A.C.A.B  .</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <a href="#" data-toggle="modal" data-target="#calendlyModal" class="sin-linea-azul">
                <span class="icon-clock-o text-white h2 d-block"></span>
              </a>
              <h2>Horario</h2>
              <p class="mb-0">De lunes a viernes<br>
              9:00 AM - 2:00 PM<br>
              4:00 PM - 8:30 PM
              </p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-comments text-white h2 d-block"></span>
              <h2>Contáctanos</h2>
              <p class="mb-0">Teléfono: (+56) 9 1412 133<br>
              HolaSoyTuClinicaDental@gmail.com</p>
            </div>
          </div>
        </div>

        
      </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">

        <div class="row pt-2 mt-2 text-center">
          <div class="col-md-12">
            <p>
              Dra. Elsa Pollito - Ced. Prof. Dentista: (52) 420420420 - Ced. Prof. Ortodoncia: 9 13412
            </p>
            <p>
           Clinica Dental &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> | Todos los derechos reservados
            </p>
            <!-- <p>
              <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
              <a href="#" class="p-2"><span class="icon-twitter"></span></a>
              <a href="#" class="p-2"><span class="icon-instagram"></span></a>

            </p> -->
          </div>

        </div>
      </div>
    </footer>



            

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>


  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>