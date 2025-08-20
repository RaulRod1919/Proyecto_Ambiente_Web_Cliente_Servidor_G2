<?php

require_once("app/config/db.php");

class Encuesta{

private $conn;

public function __construct() {
    $this->conn = Database::connect();
}

public function addEncuesta($titulo, $descripcion, $likes, $dislikes, $idUsuario){
    $sql = "INSERT INTO `encuestas`(`titulo`, `decripcion`, `cantidad_likes`, `cantidad_dislikes`, `id_usuario`) VALUES (?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssiii", $titulo, $descripcion, $likes, $dislikes, $idUsuario);
    return $stmt->execute();
}

public function getEncuestas(){
    $sql = "SELECT * FROM `encuestas`";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all();
}

public function getEncuesta($idEncuesta){
    $sql = "SELECT * FROM `encuestas` WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$idEncuesta);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

public function updateEncuesta($titulo, $descripcion, $idEncuesta){
    $sql = "UPDATE`encuestas` SET titulo = ?, decripcion = ? WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssi", $titulo, $descripcion, $idEncuesta);
    return $stmt->execute();
}

public function deleteEncuesta($idEncuesta){
    $sql = "DELETE FROM `encuestas` WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idEncuesta);
    return $stmt->execute();
}

}

?>