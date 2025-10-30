<!-- Conexion  -->

<?php
$servidor = "localhost";
$usuarioBD = "root";
$contrasenaBD = "";
$nombreBD = "matchkill";

// hacemos la conexion y guardamos eso en la variable $conexion

$conexion = new mysqli($servidor, $usuarioBD, $contrasenaBD, $nombreBD);

// verificamos la conexion

if ($conexion->connect_error) {
    die("La conexion ha fallado: " . $conexion->connect_error);
}
?>
