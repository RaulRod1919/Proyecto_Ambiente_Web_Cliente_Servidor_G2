<?php

include_once("app/modelo/Reporte.php");

class ReporteController{

    public function save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton){
        $reporte = new Reporte();
        if($reporte->save($idUsuario, $idCategoria, $titulo, $descripcion, $estado, $prioridad, $idCanton)){
            return json_encode(["succes" => "El reporte a sido guardado con exito"]);
        }else{
            return json_encode(["error" => "El reporte no a sido guardado con exito"]);
        }
    }

}

?>