<?php

require_once("app/controlador/CategoriaController.php");
require_once("app/controlador/ProvinciaController.php");
require_once("app/controlador/CantonController.php");
require_once("app/controlador/ReporteController.php");
require_once("app/controlador/UsuarioController.php");

$action = $_GET["action"];
$catController = new CategoriaController();
$provController = new ProvinciaController();
$cantonesController = new CantonController();
$reportController = new ReporteController();
$userController = new UsuarioController();


switch($action){
    case'getCategorias':
        echo $catController->getCategorias();
    break;
    case'getProvincias':
        echo $provController->getProvincias();
    break;
    case'getCantonesProvincia':
        echo $cantonesController->getCantonesProvincia($_GET["provincia"]);
    break;
    case'saveReport':
        echo $reportController->save($_POST["idUsuario"], $_POST["idCategoria"], $_POST["titulo"], $_POST["descripcion"], 
        $_POST["estado"], $_POST["prioridad"], $_POST["idCanton"]);
    break;
    case'saveUser':
        echo $userController->save($_POST['idCanton'], $_POST['nombre'], $_POST['apellido1'],
         $_POST['apellido2'], $_POST['correo'], $_POST['password'], $_POST['rol']);
    break;
}

?>