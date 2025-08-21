<?php


class Database{
//Cambiar los datos de conexión a la base de datos de ser necesario
static function connect(){
    return $conn = new mysqli("localhost", "root", "joseraulrp196:)", "vecireport");
}
}