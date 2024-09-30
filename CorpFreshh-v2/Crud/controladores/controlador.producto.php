<?php
require '../ModeloDAO/ProductoDao.php';
require '../ModeloDTO/ProductoDto.php';
require '../Utilidades/conexion.php';

if(isset($_POST['registro'])){
$uDao = new ProductoDao();
$uDto = new ProductoDto();


$uDto->setnombre_producto($_POST['nombre_producto']);
$uDto->setdescripcion_producto($_POST['descripcion_producto']);
$uDto->setcolor_producto($_POST['color_producto']);
$uDto->setprecio_producto($_POST['precio_producto']);
$uDto->setimagen_producto($_POST['imagen_producto']);
$uDto->setnombre_marca($_POST['nombre_marca']);
$uDto->settalla($_POST['talla']);
$uDto->setid_categoria($_POST['id_categoria']);



$mensaje = $uDao->registrarProducto($uDto);

header("Location:../productos.php?mensaje=".$mensaje);

}
else if ($_GET['id']!=NULL){
    $uDao = new ProductoDao();
    $mensaje = $uDao->eliminarProducto($_GET['id']);
    header("Location:../productos.php?mensaje=".$mensaje);

}else if (isset($_POST['modificar'])){
    $uDao = new ProductoDao();
    $uDto = new ProductoDto();
    $uDto->setid_producto($_POST['id_producto']);
    $uDto->setnombre_producto($_POST['nombre_producto']);
    $uDto->setdescripcion_producto($_POST['descripcion_producto']);
    $uDto->setcolor_producto($_POST['color_producto']);
    $uDto->setprecio_producto($_POST['precio_producto']);
    $uDto->setimagen_producto($_POST['imagen_producto']);
    $uDto->setnombre_marca($_POST['nombre_marca']);
    $uDto->settalla($_POST['talla']);
    $uDto->setid_categoria($_POST['id_categoria']);
    

    $mensaje =$uDao->modificarProducto($uDto);
    header("Location:../productos.php?mensaje=".$mensaje);
}

?>