<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$paginaActual = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>The warriors 1979</title>

    <link rel="icon" type="image/png" href="./Icons/the-warriors-seeklogo.png">
    
    <link rel="stylesheet" href="/-26-ACN2BV-Tobias-Vallejos/css/Fondo.css">
    <link rel="stylesheet" href="/-26-ACN2BV-Tobias-Vallejos/css/General.css">
    <link rel="stylesheet" href="/-26-ACN2BV-Tobias-Vallejos/css/Vinculos.css">
    <link rel="stylesheet" href="/-26-ACN2BV-Tobias-Vallejos/css/Fuente.css">

</head>
<body class="index tema-<?php echo htmlspecialchars($temaActual); ?>">
    
        <header id="arriba">
        <nav>
            <a class="home" href="/-26-ACN2BV-Tobias-Vallejos/index.php"><img src="/-26-ACN2BV-Tobias-Vallejos/Icons/the-warriors-seeklogo.png" alt="warriors" title="Home" height= "60px" /></a>
            <a href="/-26-ACN2BV-Tobias-Vallejos/Sobre_la_pelicula.php">Sobre la pelicula</a>
            <a href="/-26-ACN2BV-Tobias-Vallejos/Page/reparto.php">Reparto</a>
            <a href="/-26-ACN2BV-Tobias-Vallejos/Page/curiosidades.php">Curiosidades</a>
            <a href="/-26-ACN2BV-Tobias-Vallejos/Page/pandillas.php">Pandillas</a>
            <a href="/-26-ACN2BV-Tobias-Vallejos/Page/contacto.php">Contacto</a>
        <?php if (isset($_SESSION['usuario_id'])): ?>
               <span class="nav-usuario">Hola, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
                <a href="/-26-ACN2BV-Tobias-Vallejos/Page/logout.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="/-26-ACN2BV-Tobias-Vallejos/Page/login.php">Iniciar Sesión</a>
                <a href="/-26-ACN2BV-Tobias-Vallejos/Page/registro.php">Registrarse</a>
            <?php endif; ?>

        
        </nav>
        <iframe data-testid="embed-iframe" style="border-radius:12px" src="https://open.spotify.com/embed/playlist/4K9Ky0zs8RF0v8mo9aN4bH?utm_source=generator&theme=1&autoplay=1" width="100%" height="150" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

    </header>
