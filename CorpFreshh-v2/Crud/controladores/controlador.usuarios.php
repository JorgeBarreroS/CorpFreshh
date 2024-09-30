<?php
require '../ModeloDAO/UsuarioDao.php';
require '../ModeloDTO/UsuarioDto.php';
require '../Utilidades/conexion.php';

if(isset($_POST['registro'])){
$uDao = new UsuarioDao();
$uDto = new UsuarioDto();


$uDto->setnombre_usuario($_POST['nombre_usuario']);
$uDto->setapellido_usuario($_POST['apellido_usuario']);
$uDto->settelefono_usuario($_POST['telefono_usuario']);
$uDto->setcorreo_usuario($_POST['correo_usuario']);
$uDto->setdireccion1_usuario($_POST['direccion1_usuario']);
$uDto->setdireccion2_usuario($_POST['direccion2_usuario']);
$uDto->setciudad_usuario($_POST['ciudad_usuario']);
$uDto->setpais_usuario($_POST['pais_usuario']);
$uDto->setcontraseña($_POST['contraseña']);


$mensaje = $uDao->registrarUsuario($uDto);

header("Location:../usuarios.php?mensaje=".$mensaje);

}
else if ($_GET['id']!=NULL){
    $uDao = new UsuarioDao();
    $mensaje = $uDao->eliminarUsuario($_GET['id']);
    header("Location:../usuarios.php?mensaje=".$mensaje);

}else if (isset($_POST['modificar'])){
    $uDao = new UsuarioDao();
    $uDto = new UsuarioDto();
    $uDto->setid_usuario($_POST['id_usuario']);
    $uDto->setnombre_usuario($_POST['nombre_usuario']);
    $uDto->setapellido_usuario($_POST['apellido_usuario']);
    $uDto->settelefono_usuario($_POST['telefono_usuario']);
    $uDto->setcorreo_usuario($_POST['correo_usuario']);
    $uDto->setdireccion1_usuario($_POST['direccion1_usuario']);
    $uDto->setdireccion2_usuario($_POST['direccion2_usuario']);
    $uDto->setciudad_usuario($_POST['ciudad_usuario']);
    $uDto->setpais_usuario($_POST['pais_usuario']);
    $uDto->setcontraseña($_POST['contraseña']);
    $uDto->setid_rol($_POST['id_rol']);
    

    $mensaje =$uDao->modificarUsuario($uDto);
    header("Location:../usuarios.php?mensaje=".$mensaje);
}

?>