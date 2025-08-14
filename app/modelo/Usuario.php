<?php

include_once("app/config/db.php");

class Usuario{

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol){
        $sql = "INSERT INTO `usuarios`(`id_canton`, `nombre`, `apellido_1`, `apellido_2`, `correo`, `password`, `rol`)
         VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("issssss", $idCanton, $nombre, $apellido1, $apellido2, $correo, $password, $rol);
        session_start();
        $_SESSION['idCanton'] = $idCanton;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido1'] = $apellido1;
        $_SESSION['apellido2'] = $apellido2;
        $_SESSION['correo'] = $correo;
        $_SESSION['rol'] = $rol;
        return $stmt->execute();
    }

    public function load($correo, $password){
    }

}

?>