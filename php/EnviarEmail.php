<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$Holamnsj="";


try {
    $Nom_Paciente= ($_POST["txtNombre"]);
    $Ape_Paciente= ($_POST["txtApellido"]);
    $Email_Paciente= ($_POST["txtCorreo"]);
    $HoraCita=($_POST["hora"]);
    $FechaCita=($_POST["fecha"]);
    $Especi=($_POST["Especialidad"]);
    $NomDoct=($_POST["NombreDoctor"]);
    $Precio=($_POST["PrecioCita"]);
    $MTP=($_POST["cboPago"]);
    

    
    
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'atencionclinicavitam@gmail.com';                     //SMTP username
    $mail->Password   = 'advitam123';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('atencionclinicavitam@gmail.com', 'AD VITAM');
    $mail->addAddress($Email_Paciente);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments

    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Cita Reservada correctamente';
    if ($MTP == 1) {
      $mail->Body    ="<html>".
      "<head><title>Email de Prueba</title>"."</head>".
      "<body>".
  
      "<div style='height: 100%;'>".
     
      "<div style='margin-bottom: 40px;'>".
        "<img src='https://share1.cloudhq-mkt3.net/067b2dfdfd4d83.jpeg'  width='100%'>".
      "</div>".
      "<p style='text-align: center;font-size: 1.3em; color: #333333; font-weight: 100; font-family: system-ui; margin-bottom: 0px; margin-top: 0px;'>Hola $Nom_Paciente $Ape_Paciente, gracias por confiar en nosotros y reservar su cita con Ad vitam, el coste de su cita es de S/$Precio, el cual ya fue cancelado gracias por confiar en nuestro metodo de pago online seguro. Le adjuntamos los datos de su cita:</p>".
      "<div style='font-family: system-ui;'>".
        "<table style='margin-left: auto; margin-right: auto;'>".
          "<tbody>".
            "<tr>".
              "<th colspan='2'>".
                "<p style='font-size: 3em; margin-top: 15px; color: #9bd0e0; font-family: system-ui; margin-bottom: 10px; font-weight: bold;'>$Especi</p>".
              "</th>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: center; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Fecha y hora elegida:</p>".
              "</td>".
              "<td style='display: flex;'>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>$FechaCita</p>".
                "<p style='margin-bottom: 0px; color: #333333; margin-top: 0px; font-weight: 100; margin-left: 12px;'>$HoraCita</p>".
              "</td>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: end; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Doctor:</p>".
              "</td>".
              "<td>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>$NomDoct</p>".
              "</td>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: end; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Direccion:</p>".
              "</td>".
              "<td>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>Av. Siempre viva 742</p>".
              "</td>".
            "</tr>".
          "</tbody>".
        "</table>".
      "</div>".
      "<div style='margin-top: 20px;'>".
        "<p style='text-align: center; font-size: 1.2em; color: #4a4a4a; font-family: system-ui; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'a>Mapa</p>".
        "<div style='margin-top: 20px;'>".

                    "<a href='https://goo.gl/maps/mMtMuYiann2uQF2M8'>". 
                        "<img style='display: block; width: 70%;  vertical-align: top; margin-left: auto;
                        margin-right: auto;' src='https://share1.cloudhq-mkt3.net/265caf874c54bb.png' alt='Si el mapa no carga, dar click aqui.' width='558'>".
                    "</a>".
  
              
      "</div>".
      "<div style='display: flex; margin-top: 60px; font-family: system-ui;'>".
        "<div style='margin-right: 20px; margin-left: auto;'>".
          "<p style='color: #4a4a4a; font-size: 1.3em; font-weight: bold;'>Contacto</p>".
          "<p style='color: #333333; font-weight: 100;'>Av. Siempreviva 742 - Sprinfield</p>".
          "<p style='color: #333333; font-weight: 100;'>AtencionClinica@AdVitam.com.pe</p>".
          "<p style='color: #333333; font-weight: 100;'>(511)225-2224/(511)225-2221</p>".
        "</div>".
        "<div style='margin-right: 20px;'>".
          "<p style='color: #4a4a4a; font-weight: bold; font-size: 1.3em;'>Mas informacion</p>".
          "<p style='color: #333333; font-weight: 100;'>Preguntas frecuentes</p>".
          "<p style='color: #333333; font-weight: 100;'>Trabaja con nosotros</p>".
          "<p style='color: #333333; font-weight: 100;'>Calidad y seguridad del paciente</p>".
          "<p style='color: #333333; font-weight: 100;'>Plantel medico</p>".
        "</div>".
        "<div style='margin-right: auto;'>".
          "<p style='color: #4a4a4a; font-size: 1.3em; font-weight: bold;'>Politicas de privacidad</p>".
          "<p style='color: #333333; font-weight: 100;'>Terminos y condiciones de la clinica</p>".
          "<p style='color: #333333; font-weight: 100;'>Terminos y condiciones pruebas Covid-19</p>".
          "<p style='color: #333333; font-weight: 100;'>Libro de reclamaciones</p>".
        "</div>".
      "</div>".
    "</div>".
    "</body>".
    "</html>"
  ;
    }else{
      $mail->Body    ="<html>".
      "<head><title>Email de Prueba</title>"."</head>".
      "<body>".
  
      "<div style='height: 100%;'>".
     
      "<div style='margin-bottom: 40px;'>".
        "<img src='https://share1.cloudhq-mkt3.net/067b2dfdfd4d83.jpeg'  width='100%'>".
      "</div>".
      "<p style='text-align: center;font-size: 1.3em; color: #333333; font-weight: 100; font-family: system-ui; margin-bottom: 0px; margin-top: 0px;'>Hola $Nom_Paciente $Ape_Paciente, gracias por confiar en nosotros y reservar tu cita con Ad vitam, le recordamos que esta pendiente el pago de su cita con un total de S/$Precio, acercarse a caja a cencelar el mismo dia de su cita, le adjuntamos los datos de su reserva:</p>".
      "<div style='font-family: system-ui;'>".
        "<table style='margin-left: auto; margin-right: auto;'>".
          "<tbody>".
            "<tr>".
              "<th colspan='2'>".
                "<p style='font-size: 3em; margin-top: 15px; color: #9bd0e0; font-family: system-ui; margin-bottom: 10px; font-weight: bold;'>$Especi</p>".
              "</th>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: center; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Fecha y hora elegida:</p>".
              "</td>".
              "<td style='display: flex;'>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>$FechaCita</p>".
                "<p style='margin-bottom: 0px; color: #333333; margin-top: 0px; font-weight: 100; margin-left: 12px;'>$HoraCita</p>".
              "</td>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: end; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Doctor:</p>".
              "</td>".
              "<td>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>$NomDoct</p>".
              "</td>".
            "</tr>".
            "<tr>".
              "<td>".
                "<p style='text-align: end; font-size: 1.2em; color: #4a4a4a; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'>Direccion:</p>".
              "</td>".
              "<td>".
                "<p style='text-align: left; color: #333333; font-weight: 100; margin-left: 8px; margin-bottom: 0px; margin-top: 0px;'>Av. Siempre viva 742</p>".
              "</td>".
            "</tr>".
          "</tbody>".
        "</table>".
      "</div>".
      "<div style='margin-top: 20px;'>".
        "<p style='text-align: center; font-size: 1.2em; color: #4a4a4a; font-family: system-ui; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'a>Mapa</p>".
        "<div style='margin-top: 20px;'>".

        "<a href='https://goo.gl/maps/mMtMuYiann2uQF2M8'>". 
            "<img style='display: block; width: 70%;  vertical-align: top; margin-left: auto;
            margin-right: auto;' src='https://share1.cloudhq-mkt3.net/265caf874c54bb.png' alt='Si el mapa no carga, dar click aqui.' width='558'>".
        "</a>".

  
      "</div>".
      "</div>".
      "<div style='display: flex; margin-top: 60px; font-family: system-ui;'>".
        "<div style='margin-right: 20px; margin-left: auto;'>".
          "<p style='color: #4a4a4a; font-size: 1.3em; font-weight: bold;'>Contacto</p>".
          "<p style='color: #333333; font-weight: 100;'>Av. Siempreviva 742 - Sprinfield</p>".
          "<p style='color: #333333; font-weight: 100;'>AtencionClinica@AdVitam.com.pe</p>".
          "<p style='color: #333333; font-weight: 100;'>(511)225-2224/(511)225-2221</p>".
        "</div>".
        "<div style='margin-right: 20px;'>".
          "<p style='color: #4a4a4a; font-weight: bold; font-size: 1.3em;'>Mas informacion</p>".
          "<p style='color: #333333; font-weight: 100;'>Preguntas frecuentes</p>".
          "<p style='color: #333333; font-weight: 100;'>Trabaja con nosotros</p>".
          "<p style='color: #333333; font-weight: 100;'>Calidad y seguridad del paciente</p>".
          "<p style='color: #333333; font-weight: 100;'>Plantel medico</p>".
        "</div>".
        "<div style='margin-right: auto;'>".
          "<p style='color: #4a4a4a; font-size: 1.3em; font-weight: bold;'>Politicas de privacidad</p>".
          "<p style='color: #333333; font-weight: 100;'>Terminos y condiciones de la clinica</p>".
          "<p style='color: #333333; font-weight: 100;'>Terminos y condiciones pruebas Covid-19</p>".
          "<p style='color: #333333; font-weight: 100;'>Libro de reclamaciones</p>".
        "</div>".
      "</div>".
    "</div>".
    "</body>".
    "</html>"
  ;
    }
   
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $Holamnsj= 'Email enviado';
    echo json_encode($Holamnsj);
} catch (Exception $e) {
  $Holamnsj= "Error en mandar email: {$mail->ErrorInfo}";
  echo json_encode($Holamnsj);
}
?>