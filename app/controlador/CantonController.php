<?php

include_once("app/modelo/Canton.php");

class CantonController{

    public function getCantonesProvincia($idProvincia){
        $canton = new Canton();
        return json_encode(["cantones" => $canton->getCantonesProvincia($idProvincia)]);
    }

}

?>