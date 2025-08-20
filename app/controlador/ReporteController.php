<?php

include_once("app/modelo/Reporte.php");

class ReporteController{

    public function save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton, $rutaImagen){
        $reporte = new Reporte();
        if($reporte->save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton, $rutaImagen)){
            return json_encode(["succes" => "El reporte a sido guardado con exito"]);
        }else{
            return json_encode(["error" => "El reporte no a sido guardado con exito"]);
        }
    }

    public function getReportes(){
        $reporte = new Reporte();
        return json_encode(["reportes" => $reporte->getReportes()]);
    }

    public function deleteReporte($idReporte){
        $reporte = new Reporte();
        if($reporte->deleteReporte($idReporte)){
            return json_encode(["succes" => "El reporte a sido eliminado correctamente"]);
        }else{
            return json_encode(["succes" => "El reporte no se pudo eliminar"]);
        }
    }

    public function getReporte($idReporte){
        $reporte = new Reporte();
        return json_encode(["reporte" => $reporte->getReporte($idReporte)]);
    }

    public function updateReporte($prioridad, $estado, $idReporte){
        $reporte = new Reporte();
        if($reporte->updateReporte($prioridad, $estado, $idReporte)){
            return json_encode(["succes" => "El reporte a sido actualizado con exito"]);
        }else{
            return json_encode(["succes" => "El reporte no se pudo actualizar"]);
        }
    }

    public function getReportesActivos(){
        $reporte = new Reporte();
        return json_encode(["reportes" => $reporte->getReportesActivos()]);
    }

}

?>