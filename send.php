<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $asunto = htmlspecialchars(trim($_POST["asunto"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo que ingresaste no es válido.";
        exit;
    }

    if (empty($nombre) || empty($mensaje)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    $to = 'test@ferisolucionesti.com.mx';
    $subject = 'Nuevo Mensaje de Contacto';
    $body = "Nombre: $nombre\nEmail: $email\nAsunto: $asunto\nMensaje:\n$mensaje";
    $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error al enviar el mensaje";
    }
} else {
    echo "Método no permitido";
}