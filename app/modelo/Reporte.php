<?php

include_once("app/config/db.php");

class Reporte{

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton){
        $sql = "INSERT INTO `reportes`
        (`id_usuario`, `id_categoria`, `titulo`, `descripcion`, `estado`, `prioridad`, `id_canton`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iissssi", $idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton);
        return $stmt->execute();
    }

}

?>