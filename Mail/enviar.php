<?php

require("class.phpmailer.php");
require("class.smtp.php");

function EnviarEmail($nombre, $email, $link)
{
    $destinatario = $email;

    // Datos de la cuenta de correo utilizada para enviar v�a SMTP
    $smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "parroquiasanjacinto503@gmail.com";  // Mi cuenta de correo
    $smtpClave = "Parroquia San Jacinto El Salvador 2020";  // Mi contrase�a

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->IsHTML(true); 
    $mail->CharSet = "utf-8";

    // VALORES A MODIFICAR //
    $mail->Host = $smtpHost; 
    $mail->Username = $smtpUsuario; 
    $mail->Password = $smtpClave;

    $mail->From = $email; // Email desde donde env�o el correo.
    $mail->FromName = 'Parroquia San Jacinto';
    $mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario

    $mail->Subject = "Verificación de su Cuenta"; // Este es el titulo del email.
    $mail->Body = "
    <html> 

    <body> 

    <h1>Hola! {$nombre}</h1>

    <p>Gracias por crear una cuenta en ParroquiaSanJacinto.com</p>

    <p>Para activarla solo entra en el enlace que aparece abajo:</p>

    <p>{$link}</p>

    <p>NO RESPONDAS A ESTE MENSAJE.</p>

    </body> 

    </html>

    <br />"; // Texto del email en formato HTML
    //$mail->AltBody = "{$mensaje} \n\n ";  Texto sin formato HTML
    // FIN - VALORES A MODIFICAR //

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    if (!$mail->send()) {
        $_SESSION['msj'] = "<script>erroremail3()</script>";
    } else {
        $_SESSION['msj'] = "<script>registrado('".$nombre."')</script>";
    }
}
?>

