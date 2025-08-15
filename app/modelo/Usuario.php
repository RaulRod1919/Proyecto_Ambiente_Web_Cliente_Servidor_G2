<?php
include_once("app/config/db.php");

class Usuario {

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    // Registrar usuario
    public function save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password, $rol) {
        $sql = "INSERT INTO usuarios (id_canton, nombre, apellido_1, apellido_2, correo, password, rol)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) return false;

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("issssss", $idCanton, $nombre, $apellido1, $apellido2, $correo, $passwordHash, $rol);
        return $stmt->execute();
    }

    // Login de usuario
    public function load($correo, $password) {
        $sql = "SELECT id, nombre, apellido_1, apellido_2, correo, password, rol FROM usuarios WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        if(!$stmt) return ["success" => false, "error" => "Error en la consulta SQL"];

        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 0){
            return ["success" => false, "error" => "Usuario no encontrado"];
        }

        $stmt->bind_result($id, $nombre, $apellido1, $apellido2, $correoDB, $hash, $rol);
        $stmt->fetch();

        if(password_verify($password, $hash)){
            if(session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['idUsuario'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido1'] = $apellido1;
            $_SESSION['apellido2'] = $apellido2;
            $_SESSION['correo'] = $correoDB;
            $_SESSION['rol'] = $rol;
            return ["success" => true];
        } else {
            return ["success" => false, "error" => "Contraseña incorrecta"];
        }
    }
}
?>
