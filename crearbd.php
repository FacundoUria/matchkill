<?php

$servername = "localhost";
$username = "root";  
$password = "";      


$conn = new mysqli($servername, $username, $password);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS matchkill";
if ($conn->query($sql) === TRUE) {
    echo "✅ Base de datos 'matchkill' creada o ya existente.<br>";
} else {
    echo "❌ Error al crear la base de datos: " . $conn->error . "<br>";
}


$conn->select_db("matchkill");


$sql = "CREATE TABLE IF NOT EXISTS jugadores (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    nivel INT(11) DEFAULT NULL,
    kda FLOAT DEFAULT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "✅ Tabla 'jugadores' creada o ya existente.<br>";
} else {
    echo "❌ Error al crear la tabla: " . $conn->error . "<br>";
}

// Insertar datos 
$sql = "INSERT INTO jugadores (id, usuario, contraseña, nivel, kda) VALUES
(11, 'KuFFa', 'facu', 25, 1),
(1, 'facundo', 'facundo', 1, 0),
(8, 'eze', 'eze', 10, 4.5),
(2, 'juan', 'juan', 5, 2.3),
(3, 'maria', 'maria', 15, 3.8),
(4, 'ana', 'ana', 20, 4.1),
(5, 'luis', 'luis', 7, 2.0),
(6, 'carlos', 'carlos', 12, 3.2),
(7, 'sofia', 'sofia', 9, 1.8),
(9, 'juan', 'juan', 6, 2.7),
(10, 'facu', 'facu', 4, 1.5),
(12, 'nico', 'nico', 11, 3.0)
ON DUPLICATE KEY UPDATE usuario=VALUES(usuario), contraseña=VALUES(contraseña), nivel=VALUES(nivel), kda=VALUES(kda)";

if ($conn->query($sql) === TRUE) {
    echo "✅ Datos insertados correctamente.<br>";
} else {
    echo "❌ Error al insertar datos: " . $conn->error . "<br>";
}

$conn->close();
echo "<br>🎉 Base de datos y tabla creadas correctamente.";
?>
