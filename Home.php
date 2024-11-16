<?php 
$Categorias = [
    ['nombre' => 'The alphabet', 'area' => 'Includes letters and basic vocabulary associated with each letter. It is useful for children to learn the letters of the alphabet.', 'imagen' => './Imag/abc.png'],
    ['nombre' => 'The colors', 'area' => 'It focuses on learning basic colors and their names in English, which helps children recognize and name common colors.', 'imagen' => './Imag/colores.jpg'],
    ['nombre' => 'Family members', 'area' => 'Contains vocabulary related to family members (such as mother, father, brother), helping children identify family relationships in English.', 'imagen' => './Imag/family.png'],
    ['nombre' => 'Body parts', 'area' => 'For learning the vocabulary of the basic parts of the human body, such as head, arms and legs, facilitating learning the human body in English.', 'imagen' => './Imag/cuerpo.png'],
    ['nombre' => 'The parts of the house', 'area' => 'Describes common areas in a house (such as kitchen, bathroom and living room), allowing children to learn about the home environment in English.', 'imagen' => './Imag/casa-0000.jpg'],
    ['nombre' => 'The numbers', 'area' => 'Covers numbers in English, for learning to recognize basic figures, something essential for learning the language.', 'imagen' => './Imag/numer.jpg'],
    ['nombre' => 'The clothes', 'area' => 'Features names of clothing items, such as T-shirt, pants and shoes, helping children learn about clothing in English.', 'imagen' => './Imag/rop.jpg'],
    ['nombre' => 'The time', 'area' => 'For children learning about time in English, introducing easy terms.', 'imagen' => './Imag/hora.png'],
    ['nombre' => 'The weather', 'area' => 'It provides vocabulary related to weather (sunny, rainy, etc.), which is useful for learning weather conditions vocabulary in English.', 'imagen' => './Imag/clima.png']
];

$enlaces = [
    'The alphabet' => 'alphabet.php',
    'The colors' => 'colors.php',
    'Family members' => 'family.php',
    'Body parts' => 'body.php',
    'The parts of the house' => 'house.php',
    'The numbers' => 'numbers.php',
    'The clothes' => 'clothes.php',
    'The time' => 'time.php',
    'The weather' => 'detalle_weather.php'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocabulary for Autism</title>
    <link rel="stylesheet" href="./Css/Pagina.css">
    <link rel="stylesheet" href="./Css/header.css">
    <link rel="stylesheet" href="./Css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    
    <?php include './header.php'; ?>

    <main>
        <div class="contenido">
            <h2>LIST - "VOCABULARY"</h2>
            <div class="busqueda">
                <input type="text" placeholder="Search categories">
            </div>
            <div class="grid-trabajadores">
                <?php foreach ($Categorias as $trabajador): ?>
                    <div class="tarjeta-trabajador">
                        <img src="<?php echo $trabajador['imagen']; ?>" alt="<?php echo $trabajador['nombre']; ?>" style="width: 100%; height: 160px; object-fit: cover;">
                        <h3><?php echo $trabajador['nombre']; ?></h3>
                        <p><?php echo $trabajador['area']; ?></p>
                        <button class="btn-detalle" onclick="window.location.href='<?php echo $enlaces[$trabajador['nombre']]; ?>'">MORE DETAILS</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        document.querySelector('.busqueda input').addEventListener('input', function () {
            const filter = this.value.toLowerCase();
            document.querySelectorAll('.tarjeta-trabajador').forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                card.style.display = name.includes(filter) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
