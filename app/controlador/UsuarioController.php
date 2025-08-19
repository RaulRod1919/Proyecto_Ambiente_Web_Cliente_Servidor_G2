<?php

require_once("app/modelo/Usuario.php");

class UsuarioController{

    public function save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol){
        $usuario = new Usuario();
        if($usuario->save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol)){
            return json_encode(["succes" => "El usuario fue guardado exitosamente"]);
        }else{
            return json_encode(["error" => "El usuario no fue guardado exitosamente"]);
        }
    }

    public function load($correo, $password){
        $usuario = new Usuario();
        if($usuario->load($correo, $password)){
            return json_encode(["succes" => "El usuario inicio sesión correctamente"]);
        }else{
            return json_encode(["error" => "El usuario no pudo iniciar sesión"]);
        }
    }

}

?>