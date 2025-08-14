<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'app/fragmentos/head.php' ?> 
</head>

<body>

  <?php include 'app/fragmentos/header.php' ?>


  <main class="main">
    <h1>Bienvenidos a <span>VeciReport</span></h1>
    <p>Tu voz importa. Participa en encuestas, reporta problemas y mantente informado sobre los proyectos de tu
      comunidad.</p>

    <div class="tarjetas">
      <div class="card">
        <h2>🗳️ Encuestas Activas</h2>
        <p>Participa en las encuestas más importantes de tu comunidad y ayuda a tomar decisiones que nos afectan a
          todos.</p>
        <a href="verEncuestas.php" class="boton">Ver Encuestas</a>
      </div>

      <div class="card">
        <h2>📊 Reportes Destacados</h2>
        <p>Consulta los reportes más importantes y mantente al día con las novedades de tu comunidad.</p>
        <a href="verReportes.php" class="boton">Ver Reportes</a>
      </div>

      <div class="card">
        <h2>📢 ¿Necesitas reportar algo?</h2>
        <p>Reporta problemas en tu comunidad de manera rápida y sencilla. Tu reporte será atendido por las autoridades
          correspondientes.</p>
        <a href="#" class="boton">Hacer un Reporte</a>
      </div>
    </div>
    <footer class="footer">
      Universidad Fidélitas - Sede Virtual, Costa Rica<br />
      Proyecto desarrollado como parte del curso de Desarrollo Web<br />
      &copy; 2025 VeciReport
    </footer>
  </main>

</body>

</html>