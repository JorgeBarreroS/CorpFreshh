<?php

class UsuarioDao{

    public function registrarUsuario(UsuarioDto $usuarioDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";

    try {
        $query = $cnn->prepare("INSERT INTO usuario values(?,?,?,?,?)");
        $query->bindParam(1, $usuarioDto->getIdUsuario());
        $query->bindParam(2, $usuarioDto->getNombre());
        $query->bindParam(3, $usuarioDto->getApellido());
        $query->bindParam(4, $usuarioDto->getDireccion());
        $query->bindParam(5, $usuarioDto->getClave());
        $query->execute();
        $mensaje= "Registro exitoso";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
//modificar usuario
public function modificarUsuario(UsuarioDto $usuarioDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare("UPDATE usuario SET nombre=?, apellido=?, direccion=?, clave=? WHERE idUsuario=?");
        $query->bindParam(1, $usuarioDto->getNombre());
        $query->bindParam(2, $usuarioDto->getApellido());
        $query->bindParam(3, $usuarioDto->getDireccion());
        $query->bindParam(4, $usuarioDto->getClave());
        $query->bindParam(5, $usuarioDto->getIdUsuario());
        $query->execute();
        $mensaje= "Registro actualizado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
    // obtener usuario
public function obtenerUsuario($id_usuario){
    $cnn = Conexion::getConexion();
    $mensaje = "";
try {
    $query = $cnn->prepare('SELECT * FROM usuario WHERE id_usuario=?');
    $query->bindParam(1, $id_usuario);
    $query->execute();
    return $query->fetch();

} catch (Exception  $ex) {
    $mensaje= $ex->getMessage();
}
$cnn= null;
return $mensaje;
}

//eliminar Usuario
public function eliminarUsuario($id_usuario){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare('DELETE FROM usuario WHERE idUsuario= ?');
        $query->bindParam(1, $id_usuario);
        $query->execute();
        $mensaje= "Registro eliminado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    return $mensaje;
}

    //Listar

    public function listarTodos(){
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'SELECT * from usuario';
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception  $ex) {
            echo 'Error'. $ex->getMessage();
        }
    }
}

?>