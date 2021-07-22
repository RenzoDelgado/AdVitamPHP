<?php
$conexion = mysqli_connect('localhost','root','','bd_advitam');
mysqli_set_charset($conexion, "utf8");
$contador = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Css/CssIndex.css" />
    <link rel="stylesheet" href="Css/Loader.css" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Clinica Ad Vitam</title>
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
                        <i class="fas fa-map-marker-alt"></i> Av.Siempreviva 742 -
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
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel">AQUI VA INFORMACION </h5>
                <button id="botonCerrar" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul>

                    <li>COVID-19</li>

                    <li>Reserva online</li>

                    <li>Y este es otro diferente.</li>

                </ul>


            </div>
        </div>
    </div>
</header>



<body>



    <section class="section1">
        <div class="carrusel">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Imagenes/PaginaPrincipal/Slider.jpg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="Imagenes/PaginaPrincipal/Slider3.jpg" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="Imagenes/PaginaPrincipal/Slider2.jpg" class="d-block w-100" alt="..." />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="section2">
        <!-- Nuestras especialidades -->
        <div class="title">
            <p>Nuestras especialidades</p>
        </div>
        <div class="optionsContainer">
            <?php  
        	$consulta = "SELECT * FROM tb_especialidad";
          $datos = mysqli_query($conexion,$consulta);
          while ($a = mysqli_fetch_assoc($datos)) {
            $contador++;
        ?>
            <div class="specialtyOption <?php echo $a["descripcion"]?>">
                <img class="imageOption" src="<?php echo $a["Imgespecialidad"]?>" alt="no hay imagen" />
                <label class="labelOption"><?php echo $a["descripcion"]?></label>
            </div>
            <?php
             if ($contador == 4)
             {
                 break;
             }
          }
          ?>
        </div>

        <div class="more">
            <a href="#" class="labelMore">Ver mas especialidades
                <img src="Imagenes/PaginaPrincipal/SEC2FlechaEntrar.png" alt="no hay imagen" /></a>
        </div>
    </section>

    <section class="section3">
        <!-- ¿Por que clinica ad vitam? -->
        <div class="containerSec3">
            <h2>¿Por qué Clínica Ad Vitam?</h2>
            <div class="elementosSec3">
                <div class="imagenSec3">
                    <img src="Imagenes/PaginaPrincipal/SEC3Doctores.jpg" />
                </div>
                <div class="detallesSec3 menu">
                    <h3>El Mejor Staff</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe
                        ipsa fugiat libero cupiditate recusandae veniam velit ipsum
                        deleniti facilis odio, minima labore harum fuga magnam dolores
                        sint quaerat beatae pariatur? Lorem ipsum dolor sit, amet
                        consectetur adipisicing elit. Odio eos similique illo voluptas ut
                        ipsum porro quasi ex repellat, rerum ab ullam, est, asperiores nam
                        nobis enim animi saepe totam?
                    </p>

                    <div class="botonPlantelSec3" data-animation="to-right">
                        <a href="Doctores.php">
                            <span class="about">Conoce a nuestro plantel</span>
                            <span class="icon">
                                <img src="Imagenes/PaginaPrincipal/SEC3FlechaEntrar.png" alt="">
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section4">
        <!-- Mas servicios para ti -->
        <p class="section4_titulo">Mas servicios para ti</p>
        <div class="containerSection4">
            <div class="elementosSec4">
                <div class="operations atencioncli">
                    <img src="Imagenes/PaginaPrincipal/SEC4AtencionCliente.jpg"
                        alt=" chale no hay imagen en atencion al cliente" />
                    <p class="title_info">Atencion al cliente</p>
                    <p class="descripcion_section4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ipsum
                        nihil eum ratione incidunt aspernatur.
                    </p>
                    <button class="button_information">Mas informacion</button>
                </div>

                <div class="operations farmaci">
                    <img src="Imagenes/PaginaPrincipal/SEC4Farmacia.jpg" alt="chale no hay imagen en farmacia" />
                    <p class="title_info">Farmacia</p>
                    <p class="descripcion_section4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ipsum
                        nihil eum ratione incidunt aspernatur.
                    </p>
                    <button class="button_information">Mas informacion</button>
                </div>
                <div class="operations lab">
                    <img src="Imagenes/PaginaPrincipal/SEC4LabyExam.png"
                        alt="chale no hay imagen oara laboratorio y examenes" />
                    <p class="title_info">Laboratorio y Examenes</p>
                    <p class="descripcion_section4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ipsum
                        nihil eum ratione incidunt aspernatur.
                    </p>
                    <button class="button_information">Mas informacion</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section5">
        <div class="containerSection5">
            <div class="contentSection5">
                <img src="Imagenes/PaginaPrincipal/SEC5Periodico.png" alt="" />
                <div class="infoSection5">
                    <p class="title_infocect5">Boletín Informativo</p>
                    <p class="descrip_infosect5">
                        Suscríbete a nuestro boletín y entérate de las novedades que tenemos
                        para ti </p>

                    <input id="textcorreo" type="email" placeholder="Correo electronico" class="textboletin" />
                    <button id="buttonbole" class="buttonboletin">ENVIAR</button>

                </div>
            </div>
        </div>
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

<script src="Js/Animaciones/gsap.js"></script>
<script src="Js/header.js" type="text/JavaScript"></script>
<script src="Js/revealjs.js"></script>
<script src="Js/alerts.js"></script>
<script src="Js/boletin.js" type="text/JavaScript"></script>

</html>