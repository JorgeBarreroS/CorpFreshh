<?php
class UsuarioDto{
    private $id_usuario = 0;
    private $nombre_usuario = "";
    private $apellido = "";
    private $direccion = "";
    private $clave = "";
// GET
function getid_usuario(){
    return $this->id_usuario;
}
function getnombre_usuario(){
    return $this->nombre_usuario;
}
function getApellido(){
    return $this->apellido;
}
function getDireccion(){
    return $this->direccion;
}
function getClave(){
    return $this->clave;
}
//set
function setid_usuario($id_usuario){
    $this->id_usuario=$id_usuario;
}
function setnombre_usuario($nombre_usuario){
    $this->nombre_usuario=$nombre_usuario;
}
function setApellido($apellido){
    $this->apellido=$apellido;
}
function setDireccion($direccion){
    $this->direccion=$direccion;
}
function setClave($clave){
    $this->clave=$clave;
}
}