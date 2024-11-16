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



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./Css/Register.css">
    <link rel="stylesheet" href="./Css/header.css">

<link rel="stylesheet" href="./Css/footer.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
<?php include './headerT.php'; ?>
    <div class="containerR">
        <div class="register-card">
            <div class="imag">
                <div class="ImagenLog">
                    <div class="Mensaje">
                            <h1>Welcome</h1>
                    </div>
                </div>
            </div>
            <div class="Mensaje1">
                <p>Enter your information below</p>
                <p>You are registering on the web platform WORDWONDER</p>
            </div>
            <form class="register-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    required
                >
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                >
                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Confirm password"
                    required
                >
                <button type="submit" class="register-button">Register</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>