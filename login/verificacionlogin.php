<?php

// llamamos al archivo conexion 

include("../conexion.php");

// obtenemos los datos del formulario LOGIN
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM jugadores WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    session_start();
    $_SESSION['usuario'] = $usuario; 

    header("Location: ../principal/principal.php");
    exit();
    
} else {

    echo "<script>
            alert(' Usuario o contraseña incorrectos');
            window.location.href = './index.html';
          </script>";
}
?>
