<?php

//Cambiar los datos de conexión a la base de datos de ser necesario
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$database = "VeciReport";

$conn = new mysqli($servername, $dbusername, $dbpassword, $database);

if ($conn->connect_error) {
    die("error de base de datos " . $conn->connect_error);
}

