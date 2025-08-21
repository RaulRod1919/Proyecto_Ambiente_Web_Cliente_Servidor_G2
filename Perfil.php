<!DOCTYPE html>
<html lang="es">

<head>
  <?php include 'app/fragmentos/head.php' ?>
  <script src="js/popUp.js"></script>
  <script src="js/participacion.js"></script>
</head>

<body>

  <?php include 'app/fragmentos/header.php' ?>


  <main class="main">
    <h1>Acceso al <span>Sistema</span></h1>

    <section class="cards">
      <?php if (empty($_SESSION['nombre']) && empty($_SESSION['correo'])): ?>
        <section class="card">
          <h2>Iniciar Sesión</h2>
          <p>Accede a tu cuenta para participar en encuestas, hacer reportes y consultar el estado de tus solicitudes.</p>
          <button class="boton" id="inicioSesion">Iniciar Sesión</button>
        </section>
      <?php endif; ?>
      <?php if (empty($_SESSION['nombre']) && empty($_SESSION['correo'])): ?>
        <section class="card">
          <h2>Registrarse</h2>
          <p>¿Eres nuevo? Crea tu cuenta gratuita y comienza a participar activamente en tu comunidad.</p>
          <button class="boton" id="crearReporte">Crear Cuenta</button>
        </section>
      <?php endif; ?>
      <?php 
        if(isset($_SESSION["correo"])){
          echo "<section class='card'>
          <h2>Log-Out</h2>
          <p>En esta sección podras cerrar sesión en tu cuenta presionando el boton de abajo.</p>
          <a class='boton' id='logout' href='logout.php'>Log-Out</a>
        </section>";
        }
      ?>
    </section>
    </section>
    <footer class="footer">
      Universidad Fidélitas - Sede Virtual, Costa Rica<br />
      Proyecto desarrollado como parte del curso de Desarrollo Web<br />
      &copy; 2025 VeciReport
    </footer>

    <div class="overlay" id="popup">
      <div class="popup">
        <button class="cerrar-btn" id="cerrar">&times;</button>
        <h2>Registro de Usuario</h2>
        <form class="form" id="user">
          <label>Nombre</label>
          <input type="text" class="entrada" id="nombre" required>
          <label>Apellido 1</label>
          <input type="text" class="entrada" id="appellido1" required>
          <label>Apellido 2</label>
          <input type="text" class="entrada" id="apellido2" required>
          <label>Correo Electronico</label>
          <input type="email" class="entrada" id="correo" required>
          <label>Contraseña</label>
          <input type="password" class="entrada" id="password" required>
          <label>Ubicación</label>
          <select type="text" class="entrada" id="provincias" required>
            <option hidden default>Provincias</option>
          </select>
          <select type="text" class="entrada" id="cantones" required>
            <option hidden default>Cantones</option>
          </select>
          <div class="contenedor-btns">
            <button class="boton-participacion bg-naranja" type="submit">Registrar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="overlay" id="popup2">
      <div class="popup">
        <button class="cerrar-btn" id="cerrar2">&times;</button>
        <h2>Inicio de sesión</h2>
        <p>Ingresa tus credenciales para iniciar sesión</p>
        <form class="form" id="login">
          <label>Correo Electronico</label>
          <input type="email" class="entrada" id="correo2" required>
          <label>Contraseña</label>
          <input type="password" class="entrada" id="password2" required>
          <div class="contenedor-btns">
            <button class="boton-participacion bg-naranja" type="submit">Iniciar sesión</button>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>