<?php
class UsuarioDto{
    private $id_usuario = 0;
    private $nombre = "";
    private $apellido = "";
    private $direccion = "";
    private $clave = "";
// GET
function getIdUsuario(){
    return $this->id_usuario;
}
function getNombre(){
    return $this->nombre;
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
function setIdUsuario($id_usuario){
    $this->id_usuario=$id_usuario;
}
function setNombre($nombre){
    $this->nombre=$nombre;
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