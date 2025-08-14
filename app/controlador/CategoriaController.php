<?php

require_once("app/modelo/Categoria.php");

class CategoriaController{

    public function getCategorias(){
        $categoria = new Categoria();
        return json_encode(["categorias" => $categoria->getCategorias()]);
    }

}

?>