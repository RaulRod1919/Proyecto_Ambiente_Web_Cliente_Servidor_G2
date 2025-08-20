<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'app/fragmentos/head.php' ?> 
    <script src="js/encuestasGenericas.js"></script>
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>

    <main class="main">
        <?php echo "<input type='hidden' id='idUsuario' value='".$_SESSION["idUsuario"]."'>" ?>
        <h1>Encuestas <span>Activas</span></h1>
        <p>Aca podrás encontrar las encuestas a las cuales no has votado, participa en ellas lo más pronto posible</p>
        <section id="encuestas-container">
            <!-- Aquí se va a cargar la lista de las encuestas genéricas con el javascript -->
        </section>
    </main>

    <?php include 'app/fragmentos/footer.php' ?>
</body>

</html>