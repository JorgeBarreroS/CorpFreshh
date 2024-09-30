<?php
require '../ModeloDAO/OrdenDao.php';
require '../ModeloDTO/OrdenDto.php';
require '../Utilidades/conexion.php';

if(isset($_POST['registro'])){
$uDao = new OrdenDao();
$uDto = new OrdenDto();

$uDto->setfecha_venta($_POST['fecha_venta']);
$uDto->setimpuesto_venta($_POST['impuesto_venta']);
$uDto->settotal_venta($_POST['total_venta']);
$uDto->setestado_venta($_POST['estado_venta']);
$uDto->setid_usuario($_POST['id_usuario']);

$mensaje = $uDao->registrarOrden($uDto);

header("Location:../ordenes.php?mensaje=".$mensaje);

}
else if ($_GET['id']!=NULL){
    $uDao = new OrdenDao();
    $mensaje = $uDao->eliminarOrden($_GET['id']);
    header("Location:../ordenes.php?mensaje=".$mensaje);

}else if (isset($_POST['modificar'])){
    $uDao = new OrdenDao();
    $uDto = new OrdenDto();
    $uDto->setid_venta($_POST['id_venta']);
    $uDto->setfecha_venta($_POST['fecha_venta']);
    $uDto->setimpuesto_venta($_POST['impuesto_venta']);
    $uDto->settotal_venta($_POST['total_venta']);
    $uDto->setestado_venta($_POST['estado_venta']);
    $uDto->setid_usuario($_POST['id_usuario']);
    $mensaje =$uDao->modificarOrden($uDto);
    header("Location:../ordenes.php?mensaje=".$mensaje);
}

?>