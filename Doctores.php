<?php
$conexion = mysqli_connect('localhost','root','','bd_advitam');
mysqli_set_charset($conexion, "utf8");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Vista doctores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.8">
    <link rel="stylesheet" type="text/css" href="css/CssDoctores.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <link rel="stylesheet" href="Css/Animate.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</head>

<header>
    <div class="headerContainer">
        <div id="HeaderUp" class="ViewHeaderUp">
            <div class="logo">
                <a href="Index.php">
                    <img src="Imagenes/Logo/est.png" alt=" Logo no disponible:(" />
                </a>

            </div>

            <div class="informationHeader">
                <ul class="informationContainer">
                    <li class="telefono">
                        <i class="fas fa-phone-alt"></i> (511)225-2224/(511)225-2221
                    </li>
                    <li class="direccion">
                        <i class="fas fa-map-marker-alt"></i> Av. Siempreviva 742 -
                        Sprinfield
                    </li>

                    <li class="usuario">
                        <a href="#">
                            <i class="fas fa-user"></i> Consulta de Usuarios
                        </a>
                    </li>

                </ul>

                <div class="redes">
                    <a class="facebook" href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                    <a class="twitter" href="#"><i class="fab fa-twitter-square"></i></a>
                    <a class="insta" href="https://www.instagram.com/hey___rasch/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="HeaderDown" data-animation="center">
            <div class="informationHeaderDown">
                <a href="#" class="link_information">COVID-19</a>
                <a href="Doctores.php" class="link_information">Plantel médico</a>
                <label class="link_information">Plan de salud <i class="fas fa-caret-down"></i></label>
                <a href="Citas.php" class="link_information">Reservar cita</a>
                <label class="link_information">Nosotros <i class="fas fa-caret-down"></i></label>
    
                <button id="botonBars" class="barrs" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fas fa-bars" style="
			color: #00d1e6;"></i>
                </button>
            </div>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">AQUI VA INFORMACION :D</h5>
                <button id="botonCerrar" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">LMAO</div>
        </div>
    </div>
</header>

<body>

    <section class="Section1">
        <div class="SlideUp">
            <img src="Imagenes/PaginaDoctores/SlideUp600.jpg" width="100%">
        </div>
    </section>

    <section class="Section2">

        <div class="especialidad">
            <div class="seleccion">
                <label>Seleccionar una especialidad:</label>
                <select class="comboEspecialidad" name="comboEspecialidades" id="cboEspecialidad">
                    <?php 
				$sql = "SELECT * FROM tb_especialidad";
				$result = mysqli_query($conexion,$sql);
					echo '<option value="" selected disabled>Especialidad</option>';
						while($mostrar = mysqli_fetch_array($result)){
			?>
                    <option value="<?php echo $mostrar['id'] ?>">
                        <?php echo $mostrar['descripcion'] ?>
                    </option>
                    <?php
				}
			?>
                </select>
                <!--	<button class="buttonfiltrar">Filtrar  <i class="fas fa-search"></i></button> -->
            </div>
        </div>

        <div class="Doctor">

            <article class="ImagenesD" id="traer">
                <!--   <button type="button" id="buttonmx" class="activo">Mas Informacion</button> -->
                <?php 
        		$consulta = "SELECT * FROM tb_doctor";
            $datos = mysqli_query($conexion,$consulta);
            while ($a = mysqli_fetch_assoc($datos)) {
        ?>
                <div class="profiledoc">
                    <img id="imgclick" src="<?php echo $a["foto"] ?>" alt="No hay imagen del doc :(">

                    
                        <button class="activo" type="button" data-bs-toggle="collapse"
                            data-bs-target="#multiCollapseExample<?php echo $a["id"] ?>" aria-expanded="false"
                            aria-controls="multiCollapseExample<?php echo $a["id"] ?>">Mas informacion</button>
                
                   
                        <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $a["id"] ?>">
                            <div class="card moreinfodoc">
                                <p class="info_doc"><?php echo $a["nombreDoctor"]." ".$a["apellidoDoctor"] ?></p>
                                <p class="info_doc">Colegiatura: <?php echo $a["nroColegiatura"]?></p>
                                <p class="info_doc"><?php echo $a["universidadDoctor"]?></p>
                            </div>
                        </div>
                   
                </div>

                <?php 
              }
              ?>
        </div>
      




        </article>
        </div>
    </section>

    <section class="Section3">
        <div class="container_sec3">
            <img src="Imagenes/PaginaDoctores/SlideDown.png" alt="" width="100%">

        </div>
        <div class="clsbutton"><a href="Citas.php">Reserva tu cita aui</a></div>
    </section>
</body>

<footer>
    <section class="container_footer">

        <div class="footer_cont">
            <p class="footer_title">Contacto</p>
            <p><i class="fas fa-map-marked-alt"></i> Av. Siempreviva 742 - Sprinfield</p>
            <p><i class="far fa-envelope"></i> AtencionClinica@AdVitam.com.pe</p>
            <p><i class="fas fa-phone-alt"></i> (511)225-2224/(511)225-2221</p>
        </div>
        <div class="footer_cont">
            <p class="footer_title">Mas informacion</p>
            <p>Preguntas frecuentes</p>
            <p>Trabaja con nosotros</p>
            <p>Calidad y seguridad del paciente</p>
            <p>Plantel medico</p>
        </div>
        <div class="footer_cont">
            <p class="footer_title">Politicas de privacidad</p>
            <p>Terminos y condiciones de la clinica</p>
            <p>Terminos y condiciones pruebas Covid-19</p>
            <p>Libro de reclamaciones</p>
        </div>

    </section>
</footer>



<!-- <script src="Js/Doctores.js"></script>-->
<script src="Js/header.js"></script>
<script src="Js/revealjs.js"></script>
<script src="Js/Animaciones/gsap.js"></script>
<script src="Js/DoctorBack.js"></script>

</html>