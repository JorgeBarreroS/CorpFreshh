<?php
class UsuarioDto{
    private $id_usuario = "";
    private $nombre_usuario = "";
    private $apellido_usuario = "";
    private $telefono_usuario = "";
    private $correo_usuario  = "";
    private $direccion1_usuario = "";
    private $direccion2_usuario = "";
    private $ciudad_usuario = "";
    private $pais_usuario = "";
    private $contraseña = "";
    private $id_rol  = 2;

// GET
function getid_usuario(){
    return $this->id_usuario;
}
function getnombre_usuario(){
    return $this->nombre_usuario;
}
function getapellido_usuario(){
    return $this->apellido_usuario;
}
function gettelefono_usuario(){
    return $this->telefono_usuario;
}
function getcorreo_usuario(){
    return $this->correo_usuario;
}
function getdireccion1_usuario(){
    return $this->direccion1_usuario;
}
function getdireccion2_usuario(){
    return $this->direccion2_usuario;
}
function getciudad_usuario(){
    return $this->ciudad_usuario;
}
function getpais_usuario(){
    return $this->pais_usuario;
}
function getcontraseña(){
    return $this->contraseña;
}
function getid_rol(){
    return $this->id_rol;
}

//set
function setid_usuario($id_usuario){
    $this->id_usuario=$id_usuario;
}
function setnombre_usuario($nombre_usuario){
    $this->nombre_usuario=$nombre_usuario;
}
function setapellido_usuario($apellido_usuario){
    $this->apellido_usuario=$apellido_usuario;
}

function settelefono_usuario($telefono_usuario){
    $this->telefono_usuario=$telefono_usuario;
}

function setcorreo_usuario($correo_usuario){
    $this->correo_usuario=$correo_usuario;
}
function setdireccion1_usuario($direccion1_usuario){
    $this->direccion1_usuario=$direccion1_usuario;
}
function setdireccion2_usuario($direccion2_usuario){
    $this->direccion2_usuario=$direccion2_usuario;
}
function setciudad_usuario($ciudad_usuario){
    $this->ciudad_usuario=$ciudad_usuario;
}
function setpais_usuario($pais_usuario){
    $this->pais_usuario=$pais_usuario;
}
function setcontraseña($contraseña){
    $this->contraseña=$contraseña;
}
function setid_rol($id_rol){
    $this->id_rol=$id_rol;
}
}