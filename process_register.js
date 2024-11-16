const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware para procesar datos del formulario
app.use(bodyParser.urlencoded({ extended: true }));

// Configuración de la conexión a la base de datos
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'LoginSystem'
});

// Conexión a la base de datos
db.connect((err) => {
    if (err) {
        console.error('Error de conexión a la base de datos:', err.message);
        return;
    }
    console.log('Conectado a la base de datos.');
});

// Ruta principal para manejar el registro
app.post('/register', (req, res) => {
    const { email, password, confirm_password } = req.body;

    if (password !== confirm_password) {
        return res.send('Las contraseñas no coinciden.');
    }

    // Verificar si el email ya está registrado
    db.query('SELECT id FROM users WHERE email = ?', [email], (err, results) => {
        if (err) {
            console.error('Error al verificar el email:', err.message);
            return res.send('Ocurrió un error. Por favor, inténtelo más tarde.');
        }

        if (results.length > 0) {
            return res.send('El email ya está registrado.');
        }

        // Insertar el nuevo usuario
        db.query('INSERT INTO users (email, password) VALUES (?, ?)', [email, password], (err) => {
            if (err) {
                console.error('Error al registrar el usuario:', err.message);
                return res.send('Error al registrar. Por favor, inténtelo de nuevo.');
            }

            // Redirigir a una página de bienvenida
            res.redirect('/welcome');
        });
    });
});

// Ruta de bienvenida (dummy)
app.get('/welcome', (req, res) => {
    res.send('Bienvenido al sistema!');
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${port}`);
});
