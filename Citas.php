<?php

$conexion = mysqli_connect('localhost','root','','bd_advitam');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="Css/CssCitas.css" />
  <link rel="stylesheet" href="Css/CssCalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>

  <script src="https://unpkg.com/scrollreveal"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <title>Reserva tu cinta online</title>
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
            <a href="#"> <i class="fas fa-user"></i> Consulta de Usuarios </a>
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

        <button id="botonBars" class="barrs" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
          aria-controls="offcanvasRight">
          <i class="fas fa-bars"></i>
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
  <div id="contai">
    <img src="Imagenes/PaginaCitas/SlideCitasMedicas.jpg" alt="" width="100%" />
  </div>

  <div class="barrita"></div>
  <div class="procesoReserva">
    <div class="procesoUno">
      <div class="procesoNumero Unos">
        <label class="numeroEstilo E1">1</label>
      </div>
      <div class="procesoDescripcion">
        <label class="letraEstilo">Especialidad / Medico</label>
      </div>
    </div>

    <div class="procesoDos">
      <div class="procesoNumero Dos">
        <label class="numeroEstilo E2">2</label>
      </div>
      <div class="procesoDescripcion">
        <label class="letraEstilo">Fecha y hora de la cita</label>
      </div>
    </div>

    <div class="procesoTres">
      <div class="procesoNumero Tres">
        <label class="numeroEstilo E3">3</label>
      </div>
      <div class="procesoDescripcion">
        <label class="letraEstilo">Datos del paciente</label>
      </div>
    </div>
  </div>

  <section class="section1 animate__animated  animate__fadeIn animate__delay-0.9s">
    <!-- Elegir especialidad y medico -->
    <div class="container_section1">
      <div class="pasos">
        <p>Paso 1: Seleciona una especialidad</p>
        <select name="cboEspecialidad" id="cboEspecialidad" class="comboespecialidad">
            <?php 

            $sql = "SELECT * FROM tb_especialidad";
            $result = mysqli_query($conexion,$sql);
            echo '<option value="0" selected disabled>Seleciona una especialidad</option>';
            while($mostrar = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['descripcion'] ?></option>
            
            <?php
            }
            ?>
          
          </select> 
      </div>

      <div class="pasos">
        <p>Paso 2: Seleciona una especialidad</p>
        <select name="cboDoctor" id="cboDoctor" class="combodoctor">
          <option value="0" selected disabled>Selecione un doctor</option>
        </select>
      </div>
    </div>
    <div class="container_buttonnext">
      <button id="boton1" class="button_next">Siguiente</button>
    </div>
  </section>

  <section class="section2 animate__animated  animate__fadeIn animate__delay-0.5s">
      <!-- Calendario fecha y hora -->
      <div class="containerSec2">
        <div class="calendar_S2">
          <div class="calendar" id="calendar">

          </div>
        </div>

        <div class="hours_S2">
          <div class="cuadradohoradis"></div>
          <label>Hora disponible</label>
          <div class="cuadradohoraselect"></div>
          <label>Hora seleccionada</label>

          <div class="horas_S2" id="containerHoras">

          
          </div>

          <div class="container_buttonnextsec2">
            <button id="botonante" class="button_next">Atras</button>
            <button id="boton2" class="button_next" disabled>Siguiente</button>
          </div>
        </div>
      </div>

    </section>

  <section class="section3Cita">
    <div class="header_section3">
      <h2 id="EspeSelect"></h2>
      <p class="date_section3" id="fechyhora">
        Fecha y hora seleccionada:
        <!-- <label>DD/MM/AAAA y HH:MM</label> -->
      </p>
      <p class="date_section3">
        <label>
            Coste total de la cita: S/
              <label id="costocita"></label>
              
        </label>
      
      </p>
      <p>
        Por favor complete el siguiente formulario, con tus datos personales
        para poder reservar su cita online
      </p>
     
    </div>
    <form id="formularioCita" action="php/EnviarEmail" method="POST">
      <div class="body_section3">
        <div class="body_left">
          <table class="table_section3">
            <tr>
              <td>
                <p>Tipo de documento:</p>
              </td>
              <td>
                <select name="cboDocumento" id="cboDocumento" class="combo">
                <?php 
                $sql = "SELECT * FROM tb_tipodocumento";
                $result = mysqli_query($conexion,$sql);
                echo '<option value="0" selected disabled>Elija su documento</option>';
                while($mostrar = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['descripcion_Doc'] ?></option>
                <?php
                }
                ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Documento:</td>
              <td>
                <input type="text" name="txtDocumento" id="doc" class="combo" />
              </td>
            </tr>
            <tr>
              <td>Fecha de nacimento:</td>
              <td>
                <input type="date" name="txtFecha" class="combo" id="edades" />
              </td>
            </tr>
            <tr>
              <td>
                <p>Celular:</p>
              </td>
              <td>
                <input type="text" name="txtCelular" id="celular" class="body_text" />
              </td>
            </tr>
            <tr>
              <td>Edad:</td>
              <td>
                <input type="number" name="txtEdad" id="inputedad" disabled class="body_text edad" />
              </td>
            </tr>
            <tr>
              <td>Metodo de pago:</td>
              <td>
                <select name="cboPago" id="cboPago" class="combo">
                <?php 
                $sql = "SELECT * FROM tb_metodopago";
                $result = mysqli_query($conexion,$sql);
                echo '<option value="0" selected disabled>Elija su documento</option>';
                while($mostrar = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['descripcion_MePa'] ?></option>
                <?php
                }
                ?>
                </select>
              </td>
            </tr>
          </table>
        </div>

        <div class="body_right">
          <table class="table_section3">
            <tr>
              <td>Nombre:</td>
              <td>
                <input type="text" name="txtNombre" id="name" class="body_text" />
              </td>
            </tr>
            <tr>
              <td>Apellido:</td>
              <td>
                <input type="text" name="txtApellido" id="ape" class="body_text" />
              </td>
            </tr>
            <tr>
              <td>Correo:</td>
              <td>
                <input type="email" name="txtCorreo" id="correo" class="body_text" />
              </td>
            </tr>
            <tr>
              <td>Aseguradora:</td>
              <td>
                <select name="cboAseguradora" id="cboAseguradora" class="combo">
                <?php 
                $sql = "SELECT * FROM tb_aseguradora";
                $result = mysqli_query($conexion,$sql);
                echo '<option value="0" selected disabled>Elija su documento</option>';
                while($mostrar = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['descripcion_Asg'] ?></option>
                <?php
                }
                ?>
                </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
      
      <div class="container_buttonnext">
      <button id="botonantesec3" class="button_next">Atras</button>
              <!--   <div id="botonantesec3" class="button_next2"><p>Atras</p></div>
        <button id="botonreserva" class="button_next">Reservar</button> -->
        <input type="submit" id="botonreserva" class="button_next" value="Reservar">
      </div>
    </form>
    
    <form action="" id="formulario-tarjeta" >
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title" id="staticBackdropLabel">
                PAGO ONLINE
              </p>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
            </div>
            <div class="clcdatos"><label class="lbl_titu">Colocar los datos correspondiente de su tarjeta:</label></div>
            <div class="modal-body">
              <div class="Card_mod" id="logo-marca">
             
              </div>
              <label class="modal_labeltite" for="inputNumero">Numero de tarjeta:</label>
              <input type="text" name="" id="inputNumero" class="modal_textbox" maxlength="19" autocomplete="off" placeholder="XXXX XXXX XXXX XXXX">
           
              <div class="modal_body_content">
                <div class="modal_body_items">
                  <label class="modal_labeltite" for="inputFecha">Fecha de caducidad:</label>
                  <input type="text" name="" id="inputFecha" class="modal_textbox" maxlength="6" autocomplete="off" placeholder="06/22">
                </div>
                <div class="modal_body_items">
                  <label for="CVV" class="modal_labeltite">Codigo CVV:</label>
                  <input type="password" name="" id="CVV" class="modal_textbox" maxlength="4" autocomplete="off">
                </div>  
              </div>
            
            </div>
            <div class="fot"><label>Ninguno de los datos ingresados en nuestro modo de pago online seran guardados, sus datos estan totalmente seguros en nuestro modo de pago online, para nuestros clientes de Ad Vitam.</label></div>
            <div class="modal-footer">
              <button type="button" class="btn_modal_accept" data-bs-dismiss="modal" id="btn_modal_card">
                ACEPTAR
              </button>

            </div>
          </div>
        </div>
      </div>
    </form>
 
  </section>
</body>
<footer>
  <section class="container_footer">
    <div class="footer_cont">
      <p class="footer_title">Contacto</p>
      <p>
        <i class="fas fa-map-marked-alt"></i> Av. Siempreviva 742 - Sprinfield
      </p>
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

<script type="text/javascript" src="Js/Progresbar.js"></script>
<script type="text/javascript" src="Js/Time.js"></script>
<script type="text/javascript" src="Js/Calendar.js"></script>
<script type="text/javascript" src="Js/CitasBack.js"></script>
<script src="Js/header.js"></script>
<script src="Js/Animaciones/gsap.js"></script>
<script src="Js/revealjs.js"></script>
<script src="Js/alerts.js"></script>
<script src="Js/Edad.js"></script>
<script src="Js/ValidacionC.js"></script>


</html>