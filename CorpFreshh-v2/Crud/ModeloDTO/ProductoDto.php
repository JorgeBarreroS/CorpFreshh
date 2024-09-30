<?php
class ProductoDto{
    private $id_producto = "";
    private $nombre_producto = "";
    private $descripcion_producto = "";
    private $color_producto = "";
    private $precio_producto  = "";
    private $imagen_producto = "";
    private $nombre_marca = "";
    private $talla = "";
    private $id_categoria = "";


// GET
function getid_producto(){
    return $this->id_producto;
}
function getnombre_producto(){
    return $this->nombre_producto;
}
function getdescripcion_producto(){
    return $this->descripcion_producto;
}
function getcolor_producto(){
    return $this->color_producto;
}
function getprecio_producto(){
    return $this->precio_producto;
}
function getimagen_producto(){
    return $this->imagen_producto;
}
function getnombre_marca(){
    return $this->nombre_marca;
}
function gettalla(){
    return $this->talla;
}
function getid_categoria(){
    return $this->id_categoria;
}

//set
function setid_producto($id_producto){
    $this->id_producto=$id_producto;
}
function setnombre_producto($nombre_producto){
    $this->nombre_producto=$nombre_producto;
}
function setdescripcion_producto($descripcion_producto){
    $this->descripcion_producto=$descripcion_producto;
}

function setcolor_producto($color_producto){
    $this->color_producto=$color_producto;
} 

function setprecio_producto($precio_producto){
    $this->precio_producto=$precio_producto;
}
function setimagen_producto($imagen_producto){
    $this->imagen_producto=$imagen_producto;
}
function setnombre_marca($nombre_marca){
    $this->nombre_marca=$nombre_marca;
}
function settalla($talla){
    $this->talla=$talla;
}
function setid_categoria($id_categoria){
    $this->id_categoria=$id_categoria;
}
}