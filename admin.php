<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'app/fragmentos/head.php' ?>
    <script src="js/panelAdmin.js"></script>
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>
    <main class="main">
        <h1>Panel de <span>Administrador</span></h1>

        <section class="cards">

            <article class="contenedor-caja">
                <div class="logo">
                    <div class="contenedor-icon-danger bg-celeste">
                        <img src="img/busqueda.png" alt="Busqueda">
                    </div>
                    Consultar Reportes
                </div>
                <p>Apartado para aprobar reportes además de asignarles un estado y poder eliminar reportes que no cumplan las politicas</p>
                <ul>
                    <li>Estado</li>
                    <li>Prioridad</li>
                    <li>Politicas</li>
                </ul>
                <?php
                        if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "Admin"){
                            echo "<a href='reportesAdmin.php'><button class='boton-participacion bg-celeste' type='button'>Gestionar Reportes</button></a>";
                        }else{
                            echo "<a><button class='boton-participacion bg-celeste' type='button'>Debes ser Administrador</button></a>";
                        }
                    ?>
            </article>

            <section class="card">
                <h2>Gestion de Encuestas</h2>
                <p>Apartado donde podras crear, editar y eliminar encuestas que podrán realizar los usuarios</p>
                <a href="encuestas.php"><button class="boton">Encuestas</button></a>
            </section>

            <section class="card">
                <h2>Panel de Usuarios</h2>
                <p>En este apartado podras asignar roles a los usuarios que se le tengan que asignar roles especiales</p>
                <a class="boton" id="gestionUser">Gestion de Usuario</a>
            </section>
            
        </section>

        <div class="overlay" id="popup">
            <div class="popup">
                <button class="cerrar-btn" id="cerrar">&times;</button>
                <h2>Crear un Nuevo Reporte</h2>
                <form class="form" id="setRol">
                    <label>Correo</label>
                    <input type="email" class="entrada" id="correo">
                    <label>Contraseña</label>
                    <input type="password" class="entrada" id="password">
                    <label>Roles</label>
                    <select type="text" class="entrada" id="rol">
                        <option default value="Admin">Administrador</option>
                        <option value="User">Usuario</option>
                    </select>
                    <div class="contenedor-btns">
                        <button class="boton-participacion bg-naranja" type="submit">Asignar Rol</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'app/fragmentos/footer.php' ?>
    </main>

</body>

</html>