<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    $to = 'carlymar204@gmail.com';
    $subject = 'New message from the contact form';
    

    $message = "Name: $nombre\n";
    $message .= "Email: $email\n";
    $message .= "Message: $mensaje\n";
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();
    
    if (mail($to, $subject, $message, $headers)) {
        echo "The message has been sent successfully.";
    } else {
        echo "There was an error sending the message.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="./Css/header.css">
    <link rel="stylesheet" href="./Css/contact.css">
    <link rel="stylesheet" href="./Css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

    <?php include './header.php'; ?>

    <div class="contact-card">
    <div class="login-card">
        <h2>Contact Form</h2>
        <form method="post" action="contact.php">
            <div class="login-form">
                <label for="nombre">Name:</label><br>
                <input type="text" id="nombre" name="nombre" required><br><br>
            </div>

            <div class="login-form">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
            </div>

            <div class="login-form">
                <label for="mensaje">Message:</label><br>
                <textarea id="mensaje" name="mensaje" required></textarea><br><br>
            </div>

            <button type="submit" class="btn-submit">Send</button>
        </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
