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
        if($this->exist($correo)){
            return false;
        }
        $stmt = $this->conn->prepare($sql);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("issssss", $idCanton, $nombre, $apellido1, $apellido2, $correo, $password, $rol);
        if($stmt->execute()){
            $result = $this->getUser($correo);
            session_start();
            $_SESSION['idUsuario'] = $result["id_usuario"];
            $_SESSION['idCanton'] = $result["id_canton"];
            $_SESSION['nombre'] = $result["nombre"];
            $_SESSION['apellido1'] = $result["apellido_1"];
            $_SESSION['apellido2'] = $result["apellido_2"];
            $_SESSION['correo'] = $result["correo"];
            $_SESSION['rol'] = $result["rol"];
            return true;
        } else {
            return false;
        }
    }

    public function exist($correo){
        $sql = "SELECT * FROM `usuarios` WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s",$correo);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
            return true;
        }
        return false;
    }

    public function getUser($correo){
        $sql = "SELECT * FROM `usuarios` WHERE correo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s",$correo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function load($correo, $password){
        if($this->exist($correo)){
            $sql = "SELECT * FROM `usuarios` WHERE correo = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s",$correo);
            $stmt->execute();
            $result = $stmt->get_result();
            $result = $result->fetch_assoc();
            if(password_verify($password, $result["password"])){
                session_start();
                $_SESSION['idUsuario'] = $result["id_usuario"];
                $_SESSION['idCanton'] = $result["id_canton"];
                $_SESSION['nombre'] = $result["nombre"];
                $_SESSION['apellido1'] = $result["apellido_1"];
                $_SESSION['apellido2'] = $result["apellido_2"];
                $_SESSION['correo'] = $result["correo"];
                $_SESSION['rol'] = $result["rol"];
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function setRol($correo, $password, $rol){
        if($this->exist($correo)){
            $user = $this->getUser($correo);
            if(password_verify($password, $user["password"])){
                $sql = "UPDATE `usuarios` SET rol = ? WHERE correo = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ss",$rol, $correo);
                return $stmt->execute();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}

?>