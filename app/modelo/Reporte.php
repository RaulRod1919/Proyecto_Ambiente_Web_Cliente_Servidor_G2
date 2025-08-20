<?php

include_once("app/config/db.php");

class Reporte{

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton, $rutaImagen){
        $sql = "INSERT INTO `reportes`
        (`id_usuario`, `id_categoria`, `titulo`, `descripcion`, `estado`, `prioridad`, `id_canton`, `ruta_imagen`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iissssis", $idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton, $rutaImagen);
        return $stmt->execute();
    }

    public function getReportes(){
        $sql = "SELECT * FROM `reportes`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function getReportesActivos(){
        $sql = "SELECT * FROM `vista_reportes_activos`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function deleteReporte($idReporte){
        $sql = "DELETE FROM `reportes` WHERE id_reporte = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idReporte);
        return $stmt->execute();
    }

    public function getReporte($idReporte){
        $sql = "SELECT * FROM `reportes` WHERE id_reporte = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idReporte);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateReporte($prioridad, $estado, $idReporte){
        $sql = "UPDATE `reportes` set prioridad = ?, estado = ? WHERE id_reporte = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $prioridad, $estado, $idReporte);
        return $stmt->execute();
    }

}

?>