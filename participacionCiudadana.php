<?php session_start();?>

<!DOCTYPE html>
<html>

<head>
    <?php include 'app/fragmentos/head.php' ?>
    <script src="js/popUp.js"></script>
    <script src="js/participacion.js"></script>
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>
    <main>
        <section class="main">
            <h1>Participación <br><span>Ciudadana</span></h1>
            <p>Tu participación es fundamental para construir una comunidad mejor</p>
            <p>Reporta tus problemas y consulta el estado de otros reportes</p>
            <section class="cards">
                <article class="contenedor-caja">
                    <div class="logo">
                        <div class="contenedor-icon-danger bg-naranja">
                            <img src="img/advertencia.png" alt="Advertencia">
                        </div>
                        Gestion de Reportes
                    </div>
                    <p>¿Haz identificado algun problema en tu comunidad? Reportalo aquí y las autoridades
                        correspondientes
                        se harán cargo.</p>
                    <ul>
                        <li>Infraestructura</li>
                        <li>Servicios públicos</li>
                        <li>Seguridad</li>
                    </ul>
                    <?php
                        if(isset($_SESSION["correo"])){
                            echo "<button class='boton-participacion bg-naranja' type='button' id='crearReporte'>Crear Reporte</button>";
                        }else{
                            echo "<button class='boton-participacion bg-naranja' type='button' disabled id='crearReporte'>Debes iniciar sesión</button>";
                        }
                ?>
                </article>
            </section>

            <section class="cards">
                <article class="txt-centro contenedor-caja ">
                    <h2>¿Como funciona el proceso?</h2>
                    <section class="pasos">
                        <div class="bg-celeste">1</div>
                        <p>Reporta el Problema</p>
                        <div class="bg-celeste">2</div>
                        <p>Revisión Inicial</p>
                        <div class="bg-celeste">3</div>
                        <p>Asignación</p>
                        <div class="bg-celeste">4</div>
                        <p>Resolución</p>
                    </section>
                </article>
            </section>
        </section>

        <div class="overlay" id="popup">
            <div class="popup">
                <button class="cerrar-btn" id="cerrar">&times;</button>
                <h2>Crear un Nuevo Reporte</h2>
                <form class="form" id="reporte">
                    <label>Titulo</label>
                    <input type="text" class="entrada" id="titulo" required>
                    <label>Categorías</label>
                    <select type="text" class="entrada" id="categorias" required></select>
                    <label>Ubicación</label>
                    <select type="text" class="entrada" id="provincias" required>
                        <option hidden default value="">Provincias</option>
                    </select>
                    <select type="text" class="entrada" id="cantones" required>
                        <option hidden default value="">Cantones</option>
                    </select>
                    <label>Descripción</label>
                    <textarea rows="3" id="descripcion" required></textarea>
                    <label>Imagen del Problema</label>
                    <input type="file" id="imagen" required>
                    <?php echo "<input type='hidden' value='".$_SESSION["idUsuario"]."' id='idUsuario'>" ?>
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