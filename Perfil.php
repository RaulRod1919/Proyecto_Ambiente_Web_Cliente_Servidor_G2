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
      <section class="card">
        <h2>Iniciar Sesión</h2>
        <p>Accede a tu cuenta para participar en encuestas, hacer reportes y consultar el estado de tus solicitudes.</p>
        <button class="boton">Iniciar Sesión</button>
      </section>

      <section class="card">
        <h2>Registrarse</h2>
        <p>¿Eres nuevo? Crea tu cuenta gratuita y comienza a participar activamente en tu comunidad.</p>
        <button class="boton" id="crearReporte">Crear Cuenta</button>
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
                    <input type="text" class="entrada" id="nombre" require>
                    <label>Apellido 1</label>
                    <input type="text" class="entrada" id="appellido1" require>
                    <label>Apellido 2</label>
                    <input type="text" class="entrada" id="apellido2" require>
                    <label>Correo Electronico</label>
                    <input type="email" class="entrada" id="correo" require>
                    <label>Contraseña</label>
                    <input type="password" class="entrada" id="password" require>
                    <label>Ubicación</label>
                    <select type="text" class="entrada" id="provincias" require>
                        <option hidden default>Provincias</option>
                    </select>
                    <select type="text" class="entrada" id="cantones" require>
                        <option hidden default>Cantones</option>
                    </select>
                    <div class="contenedor-btns">
                        <button class="boton-participacion bg-naranja" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
  </main>
</body>

</html>