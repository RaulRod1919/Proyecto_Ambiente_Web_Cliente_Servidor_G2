<?php

require_once("app/config/db.php");

class Canton{

private $conn;

public function __construct() {
    $this->conn = Database::connect();
}

public function getCantonesProvincia($idProvincia){
    $sql = "SELECT * FROM `cantones` WHERE id_provincia = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i",$idProvincia);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all();
}

}

?>