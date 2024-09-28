<?php
require '../ModeloDAO/CategoriaDao.php';
require '../ModeloDTO/CategoriaDto.php';
require '../Utilidades/conexion.php';

if(isset($_POST['registro'])){
$uDao = new CategoriaDao();
$uDto = new CategoriaDto();
$uDto->setid_categoria($_POST['id_categoria']);
$uDto->setnombre_categoria($_POST['nombre_categoria']);
$mensaje = $uDao->registrarCategoria($uDto);

header("Location:../categoria.php?mensaje=".$mensaje);

}
else if ($_GET['id']!=NULL){
    $uDao = new CategoriaDao();
    $mensaje = $uDao->eliminarCategoria($_GET['id']);
    header("Location:../categoria.php?mensaje=".$mensaje);

}else if (isset($_POST['modificar'])){
    $uDao = new CategoriaDao();
    $uDto = new CategoriaDto();
    $uDto->setid_categoria($_POST['id_categoria']);
    $uDto->setnombre_categoria($_POST['nombre_categoria']);
   

    $mensaje = $uDao->modificarCategoria($uDto);
    header("Location:../categoria.php?mensaje=".$mensaje);
}

?>