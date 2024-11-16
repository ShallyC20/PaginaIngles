<?php 
function generarBotones($titulo, $items) {
    echo "<div class='boton-menu'>";
    echo "<button class='btn-menu' onclick='mostrarContenido(\"$titulo\")'>{$titulo}</button>";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Numbers</title>
    <link rel="stylesheet" href="./Css/header.css">
    <link rel="stylesheet" href="./Css/numbers.css">
    <link rel="stylesheet" href="./Css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include './header.php'; ?>

    <main>
        <aside>
            <?php
            generarBotones('Detail', []);
            generarBotones('Numbers from 1 to 10', ['0 KM', 'LISTA - "0KM"', 'USADOS', 'LISTA - "USADOS"', 'REPUESTOS', 'LISTA - REPUESTOS']);
            generarBotones('Numbers from 11 to 20', ['LISTA DE TRABAJADORES', 'CONFIGURACIÓN TRABAJADORES']);
            generarBotones('Numbers from 23 to 30', []);
            generarBotones('Numbers from 31 to 40', []);
            generarBotones('Numbers from 41 to 50', []);
            generarBotones('Numbers from 51 to 60', []);
            generarBotones('Numbers from 61 to 70', []);
            generarBotones('Numbers from 71 to 80', []);
            generarBotones('Numbers from 81 to 90', []);
            generarBotones('Numbers from 91 to 100', []);
            ?>
        </aside>
        
        <section class="contenido-numeros" id="contenido">
            <h1>The Numbers</h1>
            <p>Learn numbers in English interactively.</p>
            <img src="./Imag/numer.jpg" alt="Animación de los números">
            <p>Recursos adicionales:</p>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        let contenidoOriginal = document.getElementById('contenido').innerHTML;

        function mostrarContenido(titulo) {
            let contenido = document.getElementById('contenido');

            if (titulo === 'Detail') {
                contenido.innerHTML = contenidoOriginal;
            } else if (titulo === 'Numbers from 1 to 10') {
                contenido.innerHTML = `
                    <h1>Numbers from 1 to 10</h1>
                    <p>Contenido relacionado con los números del 1 al 10...</p>
                `;
            } else if (titulo === 'Numbers from 11 to 20') {
                contenido.innerHTML = `
                    <h1>Numbers from 11 to 20</h1>
                    <p>Contenido relacionado con los números del 11 al 20...</p>
                `;
            } else if (titulo === 'Numbers from 23 to 30') {
                contenido.innerHTML = `
                    <h1>Numbers from 23 to 30</h1>
                    <p>Contenido relacionado con los números del 23 al 30...</p>
                `;
            } else {
                contenido.innerHTML = `
                    <h1>Contenido general</h1>
                    <p>Seleccione un número para ver el contenido relacionado.</p>
                `;
            }
        }
    </script>
</body>
</html>

