<?php
include("ranking.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleranking.css">
</head>
<body>
    <div class="ranking">
        <h2>Ranking</h2>

        <?php
        $posicion = 1;
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<div class='jugador'>
                        $posicion. {$fila['usuario']} - Nivel: {$fila['nivel']} - KDA: {$fila['kda']}
                      </div>";
                $posicion++;
            }
        } else {
        }
        ?>
    </div>
</body>
</html>