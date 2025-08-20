<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>

<head>
    <?php include 'app/fragmentos/head.php' ?>
    <script>
        var usuarioLoggeado = <?php echo (!empty($_SESSION['nombre']) || !empty($_SESSION['correo'])) ? 'true' : 'false'; ?>;
    </script>
    <script src="js/enviarCorreo.js" defer></script>
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>
    <main>
        <section class="main">
            <h1>Centro de <span>Ayuda</span></h1>
            <section class="cards">
                <article class="card">
                    <h3>📘 FAQ</h3>
                    <p>Encuentra respuestas a las preguntas más frecuentes sobre el uso de la plataforma.</p>
                    <a href="verPreguntas.php" class="btn btn-faq">Ver preguntas</a>
                </article>
                <article class="card">
                    <h3>📞 Contacto</h3>
                    <p>¿Necesitas ayuda personalizada? Contáctanos a través de nuestro formulario.</p>
                    <button class="btn btn-contacto" id="contacto">Contactar</button>
                    <?php if (!empty($_SESSION['nombre'])): ?>
                        <div class="usuario-loggeado">
                        </div>
                    <?php endif; ?>
                </article>
                <article class="card">
                    <h3>🛡️ Políticas</h3>
                    <p>Consulta nuestras políticas de uso y privacidad para conocer tus derechos.</p>
                    <a href="verPoliticas.php" class="btn btn-politicas">Ver políticas</a>
                </article>
            </section>
        </section>

    </main>

    <div class="overlay" id="popup-contacto" style="display:none;">
        <div class="popup">
            <button class="cerrar-btn" id="cerrar-contacto">&times;</button>
            <h2>Contacto Soporte</h2>
            <form id="form-contacto">
                <label for="motivo">Motivo del contacto:</label>
                <input class="entrada" type="text" id="motivo" name="motivo" required>
                <label for="descripcion">Descripción del problema:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
                <button type="submit" class="boton">Enviar</button>
            </form>
        </div>
    </div>

    <?php include 'app/fragmentos/footer.php' ?>

</body>

</html>