<?php

class CategoriaDao{

    public function registrarCategoria(CategoriaDto $categoriaDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";

    try {
        $query = $cnn->prepare("INSERT INTO categoria values(?,?)");
        $query->bindParam(1, $categoriaDto->getid_categoria());
        $query->bindParam(2, $categoriaDto->getnombre_categoria());
        $query->execute();
        $mensaje= "Registro exitoso";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
//modificar categoria
public function modificarCategoria(CategoriaDto $categoriaDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare("UPDATE categoria SET  nombre_categoria=? WHERE id_categoria=?");
        $query->bindParam(1, $categoriaDto->getnombre_categoria());
        $query->bindParam(2, $categoriaDto->getid_categoria());
        $query->execute();
        $mensaje= "Registro actualizado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
    // obtener categoria
public function obtenerCategoria($id_categoria){
    $cnn = Conexion::getConexion();
    $mensaje = "";
try {
    $query = $cnn->prepare('SELECT * FROM categoria WHERE id_categoria=?');
    $query->bindParam(1, $id_categoria);
    $query->execute();
    return $query->fetch();

} catch (Exception  $ex) {
    $mensaje= $ex->getMessage();
}
$cnn= null;
return $mensaje;
}

//eliminar Categoria
public function eliminarCategoria($id_categoria){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare('DELETE FROM categoria WHERE id_categoria= ?');
        $query->bindParam(1, $id_categoria);
        $query->execute();
        $mensaje= "Registro eliminado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    return $mensaje;
}

    //ListarCategoria
public function listarTodos(){
        $cnn = Conexion::getConexion();

        try {
            $listarCategoria = 'SELECT * from categoria';
            $query = $cnn->prepare($listarCategoria);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception  $ex) {
            echo 'Error'. $ex->getMessage();
        }
    }
}

?>