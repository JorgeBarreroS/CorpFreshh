<?php
class CategoriaDto{
    private $id_categoria = 0;
    private $nombre_categoria = "";

// GET
function getid_categoria(){
    return $this->id_categoria;
}

function getnombre_categoria(){
    return $this->nombre_categoria;
}

//set
function setid_categoria($id_categoria){
    $this->id_categoria=$id_categoria;
}
function setnombre_categoria($nombre_categoria){
    $this->nombre_categoria=$nombre_categoria;
}
}