<?php

require_once("app/modelo/Usuario.php");

//class UsuarioController{

   // public function save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol){
       // $usuario = new Usuario();
       // if($usuario->save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol)){
            //return json_encode(["succes" => "El usuario fue guardado exitosamente"]);
       // }else{
            //return json_encode(["error" => "El usuario no fue guardado exitosamente"]);
       // }
   // }

//}


class UsuarioController{

    public function save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol){
        $usuario = new Usuario();
        header('Content-Type: application/json'); 
        if($usuario->save($idCanton, $nombre, $apellido1, $apellido2, $correo, $password ,$rol)){
            echo json_encode(["success" => true, "message" => "El usuario fue guardado exitosamente"]);
        } else {
            echo json_encode(["success" => false, "error" => "El usuario no fue guardado exitosamente"]);
        }
        exit(); 
    }
     


    
}
?>






