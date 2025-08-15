<?php


class Database{
//Cambiar los datos de conexión a la base de datos de ser necesario joseraulrp196:)
static function connect(){
    return $conn = new mysqli("localhost", "root", "", "vecireport5");
}
}