<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>

<header>
  <div class="logo">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/groups.png" alt="Logo">
    VeciReport
  </div>
  <nav>
    <div class="nav-links">
      <a href="index.php">INICIO</a>
      <a href="paginaInfo.php">INFORMACIÓN</a>
      <a href="paginaAyuda.php">AYUDA</a>
      <a href="participacionCiudadana.php" id="participacion">PARTICIPACIÓN CIUDADANA</a>
      <a href="Perfil.php">PERFIL</a>
      <?php
        if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Admin"){
            echo "<a href='admin.php'>ADMIN</a>";
          }
      ?>
    </div>
    <?php if (!empty($_SESSION['nombre'])): ?>
      <div class="usuario-loggeado">
        <span>👤 <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
      </div>
    <?php elseif (!empty($_SESSION['correo'])): ?>
      <div class="usuario-loggeado">
        <span>👤 <?php echo htmlspecialchars($_SESSION['correo']); ?></span>
      </div>
    <?php endif; ?>
  </nav>
</header>