<?php 
session_start();
if(isset($_SESSION['correo'])){
    header('Location: index.php'); // Redirige si ya hay una sesión iniciada
    exit();  
}

header("Cache-Control: no-cache, no-store, must-revalidate");
header('Pragma: no-cache');
header("Expires:0");

require 'Utilidades/conexion.php';
$cnn = Conexion::getConexion();
$usu = $_POST['txtUsu']; // Correo ingresado por el usuario
$contra = $_POST['txtPass']; // Contraseña ingresada por el usuario

// Consulta para obtener el usuario y desencriptar la contraseña usando AES_DECRYPT
$sentencia = $cnn->prepare("SELECT t_id_usuario, correo, AES_DECRYPT(contraseña, 'almuerzo') AS contraseña_desencriptada 
                            FROM t_usuario WHERE correo = ?;");
$sentencia->execute([$usu]);
$valor = $sentencia->fetch(PDO::FETCH_OBJ); // Obtiene el resultado de la consulta

if($valor === FALSE || !$valor) {
    // Si no se encuentra el usuario, redirige con error
    header('Location: login.php?error=1');
    exit();
} else {
    // Compara la contraseña desencriptada con la ingresada por el usuario
    if($valor->contraseña_desencriptada === $contra) {
        // Si la contraseña coincide, inicia la sesión
        $_SESSION['correo'] = $valor->correo;
        header('Location: index.php');
        exit();
    } else {
        // Si la contraseña no coincide, redirige con error
        header('Location: login.php?error=1');
        exit();
    }
}
?>
