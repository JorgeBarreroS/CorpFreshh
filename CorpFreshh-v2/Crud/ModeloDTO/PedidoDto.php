<?php
class PedidoDto{
    private $id_pedido   = "";
    private $id_venta  = "";
    private $id_usuario  = "";
    private $fecha_pedido = "";
    private $estado_pedido  = "";
    private $metodo_envio_pedido  = "";



// GET
function getid_pedido (){
    return $this->id_pedido ;
}
function getid_venta (){
    return $this->id_venta ;
}
function getid_usuario (){
    return $this->id_usuario ;
}
function getfecha_pedido(){
    return $this->fecha_pedido;
}
function getestado_pedido(){
    return $this->estado_pedido;
}
function getmetodo_envio_pedido(){
    return $this->metodo_envio_pedido;
}


//set
function setid_pedido ($id_pedido ){
    $this->id_pedido =$id_pedido ;
}
function setid_venta ($id_venta ){
    $this->id_venta =$id_venta ;
}
function setid_usuario ($id_usuario ){
    $this->id_usuario =$id_usuario ;
}

function setfecha_pedido($fecha_pedido){
    $this->fecha_pedido=$fecha_pedido;
} 

function setestado_pedido($estado_pedido){
    $this->estado_pedido=$estado_pedido;
}
function setmetodo_envio_pedido($metodo_envio_pedido){
    $this->metodo_envio_pedido=$metodo_envio_pedido;
}

}
