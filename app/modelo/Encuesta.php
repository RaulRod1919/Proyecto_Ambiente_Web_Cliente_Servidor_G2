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

//Esta es para obtener las enceustas que un usuario NO a votado
public function getEncuestas2($idUsuario){
    $sql = "SELECT e.* FROM encuestas e WHERE e.id_encuesta NOT IN (SELECT eu.id_encuesta FROM encuestas_usuarios eu WHERE eu.id_usuario = ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all();
}

public function updateEncuesta($titulo, $descripcion, $idEncuesta){
    $sql = "UPDATE`encuestas` SET titulo = ?, decripcion = ? WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssi", $titulo, $descripcion, $idEncuesta);
    return $stmt->execute();
}

public function deleteEncuesta($idEncuesta){
    $sql = "DELETE FROM encuestas_usuarios WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idEncuesta);
    $stmt->execute();
    $sql = "DELETE FROM `encuestas` WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idEncuesta);
    return $stmt->execute();
}

public function like($idEncuesta, $idUsuario){
    $sql = "UPDATE`encuestas` SET cantidad_likes = cantidad_likes + 1 WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idEncuesta);
    $stmt->execute();
    $sql = "INSERT INTO `encuestas_usuarios`(`Id_usuario`, `Id_encuesta`) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $idUsuario, $idEncuesta);
    return $stmt->execute();
}

public function dislike($idEncuesta, $idUsuario){
    $sql = "UPDATE`encuestas` SET cantidad_dislikes = cantidad_dislikes + 1 WHERE id_encuesta = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $idEncuesta);
    $stmt->execute();
    $sql = "INSERT INTO `encuestas_usuarios`(`Id_usuario`, `Id_encuesta`) VALUES (?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $idUsuario, $idEncuesta);
    return $stmt->execute();
}

}

?>