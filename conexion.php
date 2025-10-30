<?php
$servidor = "localhost";
$usuarioBD = "root";
$contrasenaBD = "";
$nombreBD = "matchkill";

$conexion = new mysqli($servidor, $usuarioBD, $contrasenaBD, $nombreBD);

if ($conexion->connect_error) {
    die("La conexion ha fallado: " . $conexion->connect_error);
}
?>
