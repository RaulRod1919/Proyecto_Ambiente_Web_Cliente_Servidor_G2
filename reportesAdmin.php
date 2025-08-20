<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'app/fragmentos/head.php' ?>
    <link rel="stylesheet" href="css/reportesAdmin.css">
    <script src="js/reportesAdmin.js"></script>
</head>
<body>

    <?php include 'app/fragmentos/header.php' ?>
    <main>
        <section class="sect">
            <div class="opt">
                <input type="text" readonly class="entrada" placeholder="ID Reporte" id="id">
                <p></p>
                <button class="btn success" id="editar" disabled>Editar</button>
                <button class="btn danger" id="eliminar" disabled>Eliminar</button>
            </div>
        </section>
        <section class="sect">
            <div class="opt bg-ligth">
                <p>Titulo</p>
                <p></p>
                <p>Prioridad</p>
                <p>Estado</p>
            </div>
        </section>

        <section class="reports"></section>

        <div class="overlay" id="popup">
            <div class="popup">
                <button class="cerrar-btn" id="cerrar">&times;</button>
                <h2>Editar estados de los reportes</h2>
                <form class="form" id="reporte">
                    <input type="hidden" id="idReporte">
                    <label>Titulo</label>
                    <input type="text" class="entrada" id="titulo" readonly>
                    <label>Descripción</label>
                    <textarea class="entrada" rows="3" id="descripcion" readonly></textarea>
                    <select type="text" class="entrada" id="prioridad" required>
                        <option hidden default value="">Prioridades</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                    </select>
                    <select type="text" class="entrada" id="estado" required>
                        <option hidden default value="">Estados</option>
                        <option value="Rechazada">Rechazada</option>
                        <option value="Aprobada">Aprobada</option>
                        <option value="Finalizada">Finalizada</option>
                    </select>
                    <label>Imagen del Problema</label>
                    <img id="imagenReporte">
                    <div class="contenedor-btns">
                        <button class="boton-participacion bg-naranja" type="submit">Enviar Reporte</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <?php include 'app/fragmentos/footer.php' ?>
</body>
</html>