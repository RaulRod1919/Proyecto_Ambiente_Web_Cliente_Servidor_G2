<?php
session_start();
require 'conexion.php';
$login_error = '';
if(isset($_POST['login'])) {
    $correo = $_POST['correo_login'];
    $password = $_POST['password_login'];

    $stmt = $mysqli->prepare("SELECT id_admin, nombre, password FROM Administradores WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado->num_rows > 0) {
        $admin = $resultado->fetch_assoc();
        if(password_verify($password, $admin['password'])) {
            $_SESSION['id'] = $admin['id_admin'];
            $_SESSION['nombre'] = $admin['nombre'];
            $_SESSION['rol'] = 'admin';
            header("Location: admin_panel.php");
            exit();
        } else {
            $login_error = "Contraseña incorrecta (admin).";
        }
    } else {
        
        $stmt = $mysqli->prepare("SELECT id_usuario, nombre, provincia, password FROM Usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            if(password_verify($password, $usuario['password'])) {
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['provincia'] = $usuario['provincia'];
                $_SESSION['rol'] = 'usuario';
                header("Location: perfil.php");
                exit();
            } else {
                $login_error = "Contraseña incorrecta.";
            }
        } else {
            $login_error = "Correo no registrado.";
        }
    }
}

$register_error = '';
if(isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $apellido_1 = $_POST['apellido_1'];
    $apellido_2 = $_POST['apellido_2'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $provincia = $_POST['provincia'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    $stmt = $mysqli->prepare("INSERT INTO Usuarios (nombre, apellido_1, apellido_2, correo, password, provincia) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido_1, $apellido_2, $correo, $password, $provincia);

    if($stmt->execute()) {
        $id_usuario = $stmt->insert_id;

      
        if(trim($telefono) != "") {
            $stmt_tel = $mysqli->prepare("INSERT INTO Telefonos (telefono) VALUES (?)");
            $stmt_tel->bind_param("s", $telefono);
            $stmt_tel->execute();
            $id_telefono = $stmt_tel->insert_id;

            $stmt_ut = $mysqli->prepare("INSERT INTO Usuarios_Telefonos (id_usuario, id_telefono) VALUES (?, ?)");
            $stmt_ut->bind_param("ii", $id_usuario, $id_telefono);
            $stmt_ut->execute();
        }

        $_SESSION['id'] = $id_usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['provincia'] = $provincia;
        $_SESSION['rol'] = 'usuario';

        header("Location: perfil.php");
        exit();
    } else {
        $register_error = "El correo ya está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema - VeciReport</title>
    <link rel="stylesheet" href="css/styleAyuda.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/groups.png" alt="Logo">
        VeciReport
    </div>
    <nav>
        <div class="nav-links">
            <a href="index.html">INICIO</a>
            <a href="paginaInfo.html">INFORMACIÓN</a>
            <a href="paginaAyuda.html">AYUDA</a>
            <a href="participacionCiudadana.html">PARTICIPACIÓN CIUDADANA</a>
            <a href="#" class="active">PERFIL</a>
        </div>
    </nav>
</header>

<main class="main">
    <h1>Acceso al <span>Sistema</span></h1>

    <section class="cards">
      
        <section class="card">
            <h2>Iniciar Sesión</h2>
            <p>Accede a tu cuenta para participar en encuestas, hacer reportes y consultar el estado de tus solicitudes.</p>
            <?php if($login_error) echo "<p style='color:red;'>$login_error</p>"; ?>

            <form method="POST">
                <input type="email" name="correo_login" placeholder="Correo" required><br><br>
                <input type="password" name="password_login" placeholder="Contraseña" required><br><br>
                <button type="submit" name="login" class="boton">Iniciar Sesión</button>
            </form>
        </section>

        
        <section class="card">
            <h2>Registrarse</h2>
            <p>¿Eres nuevo? Crea tu cuenta gratuita y comienza a participar activamente en tu comunidad.</p>
            <?php if($register_error) echo "<p style='color:red;'>$register_error</p>"; ?>

            <form method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required><br><br>
                <input type="text" name="apellido_1" placeholder="Primer Apellido" required><br><br>
                <input type="text" name="apellido_2" placeholder="Segundo Apellido"><br><br>
                <input type="text" name="provincia" placeholder="Provincia" required><br><br>
                <input type="email" name="correo" placeholder="Correo" required><br><br>
                <input type="password" name="password" placeholder="Contraseña" required><br><br>
                <input type="text" name="telefono" placeholder="Número de Teléfono"><br><br>
                <button type="submit" name="register" class="boton">Crear Cuenta</button>
            </form>
        </section>
    </section>

    <footer class="footer">
        Universidad Fidélitas - Sede Virtual, Costa Rica<br>
        Proyecto desarrollado como parte del curso de Desarrollo Web<br>
        &copy; 2025 VeciReport
    </footer>
</main>
</body>
</html>
