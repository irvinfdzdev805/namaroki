<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* $name = filter_input(INPUT_POST, 'name', htmlspecialchars($_POST['name']));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', htmlspecialchars($str));
    $message = filter_input(INPUT_POST, 'message', htmlspecialchars($str)); */

    $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
    $subject = htmlspecialchars(stripslashes(trim($_POST['subject'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $message = htmlspecialchars(stripslashes(trim($_POST['message'])));

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Invalid email format";
        exit;
    }

    $to = "irvinfdzdev805@gmail.com";
    $headers = "From: $email";
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully";
    } else {
        echo "Failed to send message";
    }
}
?>