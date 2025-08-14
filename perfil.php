<?php
session_start();
require 'conexion.php';


if(!isset($_SESSION['id']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: acceso.php");
    exit();
}

$id_usuario = $_SESSION['id'];


$stmt = $mysqli->prepare("SELECT nombre, apellido_1, apellido_2, correo, provincia FROM Usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt_tel = $mysqli->prepare("SELECT t.telefono
                              FROM Telefonos t
                              INNER JOIN Usuarios_Telefonos ut ON t.id_telefono = ut.id_telefono
                              WHERE ut.id_usuario = ?");
$stmt_tel->bind_param("i", $id_usuario);
$stmt_tel->execute();
$resultado_tel = $stmt_tel->get_result();
$telefonos = [];
while($fila = $resultado_tel->fetch_assoc()){
    $telefonos[] = $fila['telefono'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - VeciReport</title>
    <link rel="stylesheet" href="css/styleAyuda.css">
</head>
<body>
<header>
  <div class="logo">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/groups.png" alt="Logo">
    VeciReport
  </div>
  <nav>
    <div class="nav-links">
      <a href="index.html">INICIO</a>
      <a href="paginaInfo.html">INFORMACIÓN</a>
      <a href="paginaAyuda.html">AYUDA</a>
      <a href="participacionCiudadana.html">PARTICIPACIÓN CIUDADANA</a>
      <a href="#" class="active">PERFIL</a>
    </div>
  </nav>
</header>

<main class="main">
    <h1>Bienvenido <span><?php echo htmlspecialchars($usuario['nombre']); ?></span></h1>

    <section class="card" style="text-align:center;">
        <h2>Mis Datos</h2>
        <p><strong>Nombre completo:</strong> <?php echo htmlspecialchars($usuario['nombre'].' '.$usuario['apellido_1'].' '.$usuario['apellido_2']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['correo']); ?></p>
        <p><strong>Provincia:</strong> <?php echo htmlspecialchars($usuario['provincia'] ?: 'No registrada'); ?></p>
        <p><strong>Teléfonos:</strong> 
            <?php echo count($telefonos) > 0 ? htmlspecialchars(implode(', ', $telefonos)) : 'No registrados'; ?>
        </p>
        <a href="logout.php"><button class="boton">Cerrar Sesión</button></a>

        
    </section>

</main>
<footer class="footer">
        Universidad Fidélitas - Sede Virtual, Costa Rica<br />
        Proyecto desarrollado como parte del curso de Desarrollo Web<br />
        &copy; 2025 VeciReport
    </footer>
