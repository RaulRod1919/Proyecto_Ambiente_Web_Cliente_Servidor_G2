<?php
session_start();

// Requiere las librerías de PHPMailer para enviar correos a soporte
require '../librerias/PHPMailer/src/PHPMailer.php';
require '../librerias/PHPMailer/src/SMTP.php';
require '../librerias/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$motivo = $_POST['motivo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$usuario = $_SESSION['nombre'] ?? 'Usuario desconocido';
$correoUsuario = $_SESSION['correo'] ?? 'Correo desconocido';

if ($motivo && $descripcion) {
    $mail = new PHPMailer(true);
    try {
        // Configuración SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'soportevecireport@gmail.com';
        $mail->Password = 'zbpv xhrp iums enie'; // PHPMailer usa un app password de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('soportevecireport@gmail.com', 'VeciReport Soporte');
        $mail->addAddress('soportevecireport@gmail.com');

        // Asunto y cuerpo
        $mail->Subject = "Contacto VeciReport: $motivo";
        $mail->Body = "Motivo: $motivo\n\nDescripción: $descripcion\n\nUsuario: $usuario\nCorreo: $correoUsuario";

        $mail->send();
        echo json_encode(['success' => 'Tu correo fue enviado correctamente.']);
    } catch (Exception $e) {
        echo json_encode(['error' => 'No se pudo enviar el correo. Error: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['error' => 'Completa todos los campos.']);
}
?>