<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: acceso.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - VeciReport</title>
    <link rel="stylesheet" href="css/styleAyuda.css">
</head>
<body>
<header>
  <div class="logo">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/groups.png" alt="Logo">
    VeciReport
  </div>
</header>

<main class="main">
    <h1>Bienvenido, <span><?php echo $_SESSION['nombre']; ?></span> (Administrador)</h1>
    <p>Este es el panel de administración.</p>
    <a href="logout.php"><button class="boton">Cerrar Sesión</button></a>
</main>
</body>
</html>
