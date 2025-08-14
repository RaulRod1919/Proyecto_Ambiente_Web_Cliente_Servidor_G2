<?php

require_once("app/config/db.php");

class Categoria{

private $conn;

public function __construct() {
    $this->conn = Database::connect();
}

public function getCategorias(){
    $sql = "SELECT * FROM `categorias`";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all();
}

}

?>