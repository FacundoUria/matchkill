<?php
include("../conexion.php");
session_start();


$usuario = $_SESSION['usuario'] ?? 'Invitado';


$sql = "SELECT * FROM jugadores WHERE usuario = '$usuario' LIMIT 1";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $id = $fila['id'];
    $nivel = $fila['nivel'] ?? "—";
    $kda = $fila['kda'] ?? "—";
} else {
    $id = $nivel = $kda = "—";
}

// ------------------ BÚSQUEDA DE MATCHCODE ------------------ //
$nombreAliado = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $matchcode = $_POST['matchcode'];

    
    $sql_aliado = "SELECT usuario FROM jugadores WHERE id = '$matchcode' LIMIT 1";
    $resultado_aliado = $conexion->query($sql_aliado);

   
    if ($resultado_aliado->num_rows > 0) {
        $fila_aliado = $resultado_aliado->fetch_assoc();
        $nombreAliado = $fila_aliado['usuario'];
    } else {
        $nombreAliado = "No existe un jugador con ese MatchCode";
    }
}
?>











<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MatchKILL - Principal</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="principalstyle.css">
</head>
<body>

<header>
    <h2>Bienvenido <?php echo $usuario; ?> a MatchKILL</h2>
</header>

      <!--------------------------------------------------Arriba IZQ-------------------------------------------------->

<main>
    <aside>
        <p><strong>MATCHCODE -</strong> <?php echo $id; ?></p>

            <form method="POST" action="">
            <input type="number" name="matchcode" placeholder="ingresar matchcode aliado">
            <button type="submit">Buscar</button>
            </form>

            <p>
            <?php 
                if (!empty($nombreAliado)) {
                    echo "$nombreAliado"  ;
                }
            ?>
            </p>

            </form>
<!-----------------------------------------------MEDIO IZQ----------------------------------------------------->
        <p>+</p>

        <div class="estadisticas">
            <p><strong>Estadísticas:</strong></p>
            <p>Nivel - <?php echo $nivel; ?></p>
            <p>KDA - <?php echo $kda; ?></p>
        </div>
        <button onclick="window.location.href='../ranking/index.php'">VER RANKING GLOBAL</button>

        <button>BUSCAR PARTIDA</button>


        <div class>

            <P><a href="../login/index.html">Usar otra cuenta</a></P>

        </div>
    </aside>

<!-------------------------------------------------CARROUSEL BOOTSTRAP--------------------------------------------------->
    <section class="contenido">
        <div class="highlights">
            <h3>Highlights</h3>

      <div id="carouselVideos" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" style="max-height: 700px; border-radius: 10px; overflow: hidden;">
    
    <div class="carousel-item active">
      <div class="ratio ratio-16x9">
        <video src="../videos/video1.mp4" class="d-block w-100" autoplay muted loop></video>
      </div>
    </div>

    <div class="carousel-item">
      <div class="ratio ratio-16x9">
        <video src="../videos/video2.mp4" class="d-block w-100" autoplay muted loop></video>
      </div>
    </div>

   

</div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselVideos" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselVideos" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  
</div>

    </section>
</main>

</body>
</html>
