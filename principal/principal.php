<?php
include("../conexion.php");
session_start();

// Recuperar el usuario de la sesión
$usuario = $_SESSION['usuario'] ?? 'Invitado';

// Buscar SOLO ese usuario en la base
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

<main>
    <aside>
        <p><strong>MATCHCODE -</strong> <?php echo $id; ?></p>

        <input type="text" placeholder="ingresar matchcode aliado">

        <p>+</p>

        <div class="estadisticas">
            <p><strong>Estadísticas:</strong></p>
            <p>Nivel - <?php echo $nivel; ?></p>
            <p>KDA - <?php echo $kda; ?></p>
        </div>
        <button onclick="window.location.href='../ranking/index.php'">VER RANKING GLOBAL</button>

        <button>BUSCAR PARTIDA</button>


        <div >
            <p><a href="../login/index.html">Usar otra cuenta</a></p>
        </div>
    </aside>


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
