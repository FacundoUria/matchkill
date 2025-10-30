<?php
include("../conexion.php");

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];

// Verificar contraseñas
if ($contraseña != $contraseña2) {
    echo "❌ Las contraseñas no coinciden.";
    exit();
}

// Verificar conexión
if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
}


$sql = "INSERT INTO jugadores (usuario, contraseña) VALUES ('$usuario', '$contraseña')";

    if ($conexion->query($sql) === TRUE) {
        
        header("Location: ../login/index.html");
        exit();
    } else {
        echo "❌ Error al registrar: " . $conexion->error;
    }
?>

