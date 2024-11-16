<?php
// Configuración de cookies de sesión seguras
session_set_cookie_params([
    'lifetime' => 3600, // Tiempo de vida de la cookie (1 hora)
    'path' => '/',
    'domain' => '', // Déjalo vacío para usar el dominio actual
    'secure' => true, // Solo a través de HTTPS
    'httponly' => true, // No accesible desde JavaScript
    'samesite' => 'Strict' // Restricción de uso en el mismo sitio
]);

session_start(); // Inicia la sesión con los parámetros configurados

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
            // Aquí podrías encriptar la contraseña usando password_hash() por seguridad
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $hashedPassword);

            if ($stmt->execute()) {
                // Guarda información del usuario en la sesión
                $_SESSION['user_id'] = $stmt->insert_id;
                $_SESSION['email'] = $email;

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
