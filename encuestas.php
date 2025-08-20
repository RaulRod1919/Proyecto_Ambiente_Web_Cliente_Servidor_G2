<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'app/fragmentos/head.php' ?>
    <link rel="stylesheet" href="css/reportesAdmin.css">
    <script src="js/panelAdmin.js"></script>
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>
    <main class="mains">
        <section class="sect">
            <div class="sect">
                <button class="btn bg-dark p-1 w100" id="agregar">Agregar</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID Encuesta</td>
                        <td>Titulo</td>
                        <td>Descripcion</td>
                        <td>Likes</td>
                        <td>Dislikes</td>
                        <td>ID Administrador</td>
                        <td>Acciones</td>
                    </tr>
                </thead>

                <tbody id="tbody">
                </tbody>
            </table>
        </section>
        <div class="overlay" id="popup">
            <div class="popup">
                <button class="cerrar-btn" id="cerrar">&times;</button>
                <h2>Crear una Nueva Encuesta</h2>
                <form class="form" id="crearEncuesta">
                    <label>Titulo</label>
                    <input type="text" class="entrada" id="titulo">
                    <label>Descripcion</label>
                    <textarea id="descripcion" rows="3"></textarea>
                    <input type="hidden" id="likes" value="0">
                    <input type="hidden" id="dislikes" value="0">
                    <?php echo "<input type='hidden' value='".$_SESSION["idUsuario"]."' id='idUsuario'>" ?>
                    <div class="contenedor-btns">
                        <button class="boton-participacion bg-naranja" type="submit">Crear Encuesta</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="overlay" id="popup2">
            <div class="popup">
                <button class="cerrar-btn" id="cerrar2">&times;</button>
                <h2>Crear una Nueva Encuesta</h2>
                <form class="form" id="actualizarEncuesta">
                    <label>Titulo</label>
                    <input type="text" class="entrada" id="titulo2">
                    <label>Descripcion</label>
                    <textarea id="descripcion2" rows="3"></textarea>
                    <input type="hidden" id="idEncuesta">
                    <div class="contenedor-btns">
                        <button class="boton-participacion bg-naranja" type="submit">Crear Encuesta</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'app/fragmentos/footer.php' ?>
    </main>
</body>

</html>