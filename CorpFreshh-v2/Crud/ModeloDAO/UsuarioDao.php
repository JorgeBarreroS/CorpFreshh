<?php

class UsuarioDao{

    public function registrarUsuario(UsuarioDto $usuarioDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";

    try {
        $query = $cnn->prepare("INSERT INTO usuario values(NULL,?,?,?,?,?,?,?,?,?,?)");
        
        $query->bindParam(1, $usuarioDto->getnombre_usuario());
        $query->bindParam(2, $usuarioDto->getapellido_usuario());
        $query->bindParam(3, $usuarioDto->gettelefono_usuario());
        $query->bindParam(4, $usuarioDto->getcorreo_usuario());
        $query->bindParam(5, $usuarioDto->getdireccion1_usuario());
        $query->bindParam(6, $usuarioDto->getdireccion2_usuario());
        $query->bindParam(7, $usuarioDto->getciudad_usuario());
        $query->bindParam(8, $usuarioDto->getpais_usuario());
        $query->bindParam(9, $usuarioDto->getcontraseña());
        $query->bindParam(10, $usuarioDto->getid_rol());

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
        $query = $cnn->prepare("UPDATE usuario SET nombre_usuario=?, apellido_usuario=?, telefono_usuario=?, correo_usuario=? , direccion1_usuario=?, direccion2_usuario=?, ciudad_usuario=?, pais_usuario=?, contraseña=?, id_rol=? WHERE id_usuario=?");
        $query->bindParam(1, $usuarioDto->getnombre_usuario());
        $query->bindParam(2, $usuarioDto->getapellido_usuario());
        $query->bindParam(3, $usuarioDto->gettelefono_usuario());
        $query->bindParam(4, $usuarioDto->getcorreo_usuario());
        $query->bindParam(5, $usuarioDto->getdireccion1_usuario());
        $query->bindParam(6, $usuarioDto->getdireccion2_usuario());
        $query->bindParam(7, $usuarioDto->getciudad_usuario());
        $query->bindParam(8, $usuarioDto->getpais_usuario());
        $query->bindParam(9, $usuarioDto->getcontraseña());
        $query->bindParam(10, $usuarioDto->getid_rol());
        $query->bindParam(11, $usuarioDto->getid_usuario());
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
        $query = $cnn->prepare('DELETE FROM usuario WHERE id_usuario= ?');
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