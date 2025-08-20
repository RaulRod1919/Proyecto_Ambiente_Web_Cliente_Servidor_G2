<?php

require_once("app/controlador/CategoriaController.php");
require_once("app/controlador/ProvinciaController.php");
require_once("app/controlador/CantonController.php");
require_once("app/controlador/ReporteController.php");
require_once("app/controlador/UsuarioController.php");
require_once("app/controlador/EncuestaController.php");

$action = $_GET["action"];
$catController = new CategoriaController();
$provController = new ProvinciaController();
$cantonesController = new CantonController();
$reportController = new ReporteController();
$userController = new UsuarioController();
$encuestaController = new EncuestaController();

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
        $carpetaDestino = "img/subidas/"; //La carpeta que creamos para subir las imagenes
        $nombreArchivo = time() . "_" . basename($_FILES["imagen"]["name"]/*esto trae el nombre del archivo original en el
        arreglo asociativo por aquello*/);
        $rutaImagen = $carpetaDestino . $nombreArchivo; //Esta es la ruta donde estara el arch para guardarlo en la base
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen); //Aca movemos el archivo desde la parte temporal a 
        //la carpeta que pusimos nosotros y ya estaría en la carpeta lista para verse
        echo $reportController->save($_POST["idUsuario"], $_POST["idCategoria"], $_POST["titulo"],
            $_POST["descripcion"], $_POST["estado"], $_POST["prioridad"], $_POST["idCanton"], $rutaImagen);
    break;
    case'saveUser':
        echo $userController->save($_POST['idCanton'], $_POST['nombre'], $_POST['apellido1'],
         $_POST['apellido2'], $_POST['correo'], $_POST['password'], $_POST['rol']);
    break;
    case'load':
        echo $userController->load( $_POST['correo'], $_POST['password']);
    break;
    case'getReportes':
        echo $reportController->getReportes();
    break;
    case'deleteReporte':
        echo $reportController->deleteReporte($_POST["idReporte"]);
    break;
    case'getReporte':
        echo $reportController->getReporte($_POST["idReporte"]);
    break;
    case'updateReporte':
        echo $reportController->updateReporte($_POST["prioridad"],$_POST["estado"],$_POST["idReporte"]);
    break;
    case'setRol':
        echo $userController->setRol( $_POST['correo'], $_POST['password'], $_POST['rol']);
    break;
    case'addEncuesta':
        echo $encuestaController->addEncuesta( $_POST['titulo'], $_POST['descripcion'], $_POST['likes'], $_POST['dislikes'], $_POST['idUsuario'] );
    break;
    case'getEncuestas':
        echo $encuestaController->getEncuestas();
    break;
    case'getEncuesta':
        echo $encuestaController->getEncuesta($_POST['idEncuesta']);
    break;
    case'actualizarEncuesta':
        echo $encuestaController->updateEncuesta($_POST['titulo'], $_POST['descripcion'],$_POST['idEncuesta']);
    break;
    case'deleteEncuesta':
        echo $encuestaController->deleteEncuesta($_POST['idEncuesta']);
    break;
    case'like':
        echo $encuestaController->like($_POST['idEncuesta'], $_POST['idUsuario']);
    break;
    case'dislike':
        echo $encuestaController->dislike($_POST['idEncuesta'], $_POST['idUsuario']);
    break;
    case'getEncuestasNoVotadas':
        echo $encuestaController->getEncuestas2($_POST['idUsuario']);
    break;
    case'getReportesActivos':
        echo $reportController->getReportesActivos();
    break;
}

?>