<?php
include("../conexion.php"); 


// Consulta del top 5 de jugadores
$sql = "SELECT usuario, nivel, kda FROM jugadores ORDER BY nivel DESC LIMIT 5";
$resultado = $conexion->query($sql);
?>
