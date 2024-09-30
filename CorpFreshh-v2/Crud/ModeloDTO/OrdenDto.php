<?php
class OrdenDto{
    private $id_venta  = "";
    private $fecha_venta = "";
    private $impuesto_venta = "";
    private $total_venta = "";
    private $estado_venta  = "";
    private $id_usuario  = "";



// GET
function getid_venta(){
    return $this->id_venta;
}
function getfecha_venta(){
    return $this->fecha_venta;
}
function getimpuesto_venta(){
    return $this->impuesto_venta;
}
function gettotal_venta(){
    return $this->total_venta;
}
function getestado_venta(){
    return $this->estado_venta;
}
function getid_usuario(){
    return $this->id_usuario;
}


//set
function setid_venta($id_venta){
    $this->id_venta=$id_venta;
}
function setfecha_venta($fecha_venta){
    $this->fecha_venta=$fecha_venta;
}
function setimpuesto_venta($impuesto_venta){
    $this->impuesto_venta=$impuesto_venta;
}

function settotal_venta($total_venta){
    $this->total_venta=$total_venta;
} 

function setestado_venta($estado_venta){
    $this->estado_venta=$estado_venta;
}
function setid_usuario($id_usuario){
    $this->id_usuario=$id_usuario;
}

}
