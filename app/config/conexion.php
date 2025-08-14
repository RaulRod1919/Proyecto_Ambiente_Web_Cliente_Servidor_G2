<?php

//Cambiar los datos de conexión a la base de datos de ser necesario

$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "VeciReport";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

