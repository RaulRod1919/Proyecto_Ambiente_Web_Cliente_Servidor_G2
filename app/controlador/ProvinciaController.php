<?php

include_once("app/modelo/Provincia.php");

class ProvinciaController{

    public function getProvincias(){
        $provincia = new Provincia();
        return json_encode(["provincias" => $provincia->getProvincias()]);
    }

}

?>