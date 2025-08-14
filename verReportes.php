<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'app/fragmentos/head.php' ?> 
</head>

<body>
    <?php include 'app/fragmentos/header.php' ?>

    <main class="main">
        <h1>Reportes Activos</h1>
         <?php
        include('./app/config/db.php');
        $sql = "SELECT id_reporte, titulo, descripcion, estado, prioridad FROM Reportes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' cellpadding='10' style='margin: 0 auto;'>";
            echo "<tr><th>Título</th><th>Descripción</th><th>Estado</th><th>Prioridad</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["descripcion"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["estado"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["prioridad"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay reportes activos.</p>";
        }
        $conn->close();
        ?>
    </main>

    <footer class="footer">
        Universidad Fidélitas - Sede Virtual, Costa Rica<br />
        Proyecto desarrollado como parte del curso de Desarrollo Web<br />
        &copy; 2025 VeciReport
    </footer>
</body>

</html>