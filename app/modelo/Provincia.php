<?php

include_once("app/config/db.php");

class Provincia{

    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getProvincias(){
        $sql = "SELECT * FROM provincias";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

}

?>