<?php
require '../ModeloDAO/PedidoDao.php';
require '../ModeloDTO/PedidoDto.php';
require '../Utilidades/conexion.php';

if(isset($_POST['registro'])){
$uDao = new PedidoDao();
$uDto = new PedidoDto();

$uDto->setid_venta($_POST['id_venta']);
$uDto->setid_usuario($_POST['id_usuario']);
$uDto->setfecha_pedido($_POST['fecha_pedido']);
$uDto->setestado_pedido($_POST['estado_pedido']);
$uDto->setmetodo_envio_pedido($_POST['metodo_envio_pedido']);

$mensaje = $uDao->registrarPedido($uDto);

header("Location:../pedidos.php?mensaje=".$mensaje);

}
else if ($_GET['id']!=NULL){
    $uDao = new PedidoDao();
    $mensaje = $uDao->eliminarPedido($_GET['id']);
    header("Location:../pedidos.php?mensaje=".$mensaje);

}else if (isset($_POST['modificar'])){
    $uDao = new PedidoDao();
    $uDto = new PedidoDto();
    $uDto->setid_pedido($_POST['id_pedido']);
    $uDto->setid_venta($_POST['id_venta']);
    $uDto->setid_usuario($_POST['id_usuario']);
    $uDto->setfecha_pedido($_POST['fecha_pedido']);
    $uDto->setestado_pedido($_POST['estado_pedido']);
    $uDto->setmetodo_envio_pedido($_POST['metodo_envio_pedido']);
    $mensaje =$uDao->modificarPedido($uDto);
    header("Location:../pedidos.php?mensaje=".$mensaje);
}

?>