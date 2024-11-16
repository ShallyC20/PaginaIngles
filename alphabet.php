<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de The Alphabet</title>
    <link rel="stylesheet" href="./Css/header.css">
    <link rel="stylesheet" href="./Css/alphabet.css">
    <link rel="stylesheet" href="./Css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    
    <?php include './header.php'; ?>

    <section class="contenido-numeros" id="contenido">
        <h1>The Alphabet</h1>
        <p>To learn the letters of the English alphabet interactively.</p>
        <img src="./Imag/abc.png" alt="Animación del alfabeto">
        
        <!-- Tarjeta con PDF -->
        <div class="tarjeta-pdf">
            <div class="tarjeta-contenido" onclick="verPDF()">
                <h2>PDF del Alfabeto</h2>
                <p>Haz clic en la tarjeta para ver el PDF.</p>
            </div>
            <div class="descargar-boton">
                <a href="./archivos/alfabeto.pdf" download>
                    <button class="btn-descargar">Descargar PDF</button>
                </a>
            </div>
        </div>
        
    </section>

    <?php include 'footer.php'; ?>
    
    <script>
        // Función para abrir el PDF en una nueva ventana
        function verPDF() {
            window.open('./archivos/alfabeto.pdf', '_blank');
        }
    </script>
</body>
</html>
