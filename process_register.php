<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'LoginSystem';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "El email ya está registrado.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $password);

            if ($stmt->execute()) {
                header("Location: welcome.php");
                exit();
            } else {
                echo "Error al registrar. Por favor, inténtelo de nuevo.";
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>