<?php

require_once("app/modelo/Encuesta.php");

class EncuestaController{

    public function addEncuesta($titulo, $descripcion, $likes, $dislikes, $idUsuario){
        $encuesta = new Encuesta();
        if($encuesta->addEncuesta($titulo, $descripcion, $likes, $dislikes, $idUsuario)){
            return json_encode(["succes" => "La encuesta fue creada con exito"]);
        }else{
            return json_encode(["error" => "La encuesta no fue creada"]);
        }
    }

    public function getEncuestas(){
        $encuesta = new Encuesta();
        return json_encode(["encuestas" => $encuesta->getEncuestas()]);
    }

    public function getEncuesta($idEncuesta){
        $encuesta = new Encuesta();
        return json_encode(["encuesta" => $encuesta->getEncuesta($idEncuesta)]);
    }

    public function updateEncuesta($titulo, $descripcion, $idEncuesta){
        $encuesta = new Encuesta();
        if($encuesta->updateEncuesta($titulo, $descripcion, $idEncuesta)){
            return json_encode(["succes" => "La encuesta fue actualizada con exito"]);
        }else{
            return json_encode(["error" => "La encuesta no fue actualizada"]);
        }
    }

    public function deleteEncuesta($idEncuesta){
        $encuesta = new Encuesta();
        if($encuesta->deleteEncuesta($idEncuesta)){
            return json_encode(["succes" => "La encuesta fue eliminada con exito"]);
        }else{
            return json_encode(["error" => "La encuesta no fue eliminada"]);
        }
    }

    public function like($idEncuesta, $idUsuario){
        $encuesta = new Encuesta();
        if($encuesta->like($idEncuesta, $idUsuario)){
            return json_encode(["succes" => "Su voto fue recibido con exito, muchas gracias"]);
        }else{
            return json_encode(["error" => "Su voto no fue recibido, ocurrio algun error"]);
        }
    }

    public function dislike($idEncuesta, $idUsuario){
        $encuesta = new Encuesta();
        if($encuesta->dislike($idEncuesta, $idUsuario)){
            return json_encode(["succes" => "Su voto fue recibido con exito, muchas gracias"]);
        }else{
            return json_encode(["error" => "Su voto no fue recibido, ocurrio algun error"]);
        }
    }

    public function getEncuestas2($idUsuario){
        $encuesta = new Encuesta();
        return json_encode(["encuestas" => $encuesta->getEncuestas2($idUsuario)]);
    }

}

?>
