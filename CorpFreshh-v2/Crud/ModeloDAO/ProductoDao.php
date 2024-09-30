<?php

class ProductoDao{

    public function registrarProducto(ProductoDto $productoDto){
    $cnn = Conexion::getConexion();
    $mensaje = ""; 

    try {
        $query = $cnn->prepare("INSERT INTO producto values(NULL,?,?,?,?,?,?,?,?)");
        

        $query->bindParam(1, $productoDto->getnombre_producto());
        $query->bindParam(2, $productoDto->getdescripcion_producto());
        $query->bindParam(3, $productoDto->getcolor_producto());
        $query->bindParam(4, $productoDto->getprecio_producto());
        $query->bindParam(5, $productoDto->getimagen_producto());
        $query->bindParam(6, $productoDto->getnombre_marca());
        $query->bindParam(7, $productoDto->gettalla());
        $query->bindParam(8, $productoDto->getid_categoria());

        $query->execute();
        $mensaje= "Registro exitoso";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
//modificar Productos
public function modificarProducto(ProductoDto $productoDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare("UPDATE producto SET nombre_producto=?, descripcion_producto=?, color_producto=?, precio_producto=? , imagen_producto=?, nombre_marca=?, talla=?, id_categoria=? WHERE id_producto=?");
        $query->bindParam(1, $productoDto->getnombre_producto());
        $query->bindParam(2, $productoDto->getdescripcion_producto());
        $query->bindParam(3, $productoDto->getcolor_producto());
        $query->bindParam(4, $productoDto->getprecio_producto());
        $query->bindParam(5, $productoDto->getimagen_producto());
        $query->bindParam(6, $productoDto->getnombre_marca());
        $query->bindParam(7, $productoDto->gettalla());
        $query->bindParam(8, $productoDto->getid_categoria());
        $query->bindParam(9, $productoDto->getid_producto());


        $query->execute();
        $mensaje= "Registro actualizado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
    // obtener Productos
public function obtenerProducto($id_producto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
try {
    $query = $cnn->prepare('SELECT * FROM producto WHERE id_producto=?');
    $query->bindParam(1, $id_producto);
    $query->execute();
    return $query->fetch();

} catch (Exception  $ex) {
    $mensaje= $ex->getMessage();
}
$cnn= null;
return $mensaje;
}

//eliminar Productos
public function eliminarProducto($id_producto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare('DELETE FROM producto WHERE id_producto= ?');
        $query->bindParam(1, $id_producto);
        $query->execute();
        $mensaje= "Registro eliminado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    return $mensaje;
}

    //Listar Productos

    public function listarTodos(){
        $cnn = Conexion::getConexion();

        try {
            $listarProducto = 'SELECT * from producto';
            $query = $cnn->prepare($listarProducto);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception  $ex) {
            echo 'Error'. $ex->getMessage();
        }
    }
}

?>