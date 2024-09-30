<?php

class OrdenDao{

    public function registrarOrden(OrdenDto $ordenDto){
    $cnn = Conexion::getConexion();
    $mensaje = ""; 

    try {
        $query = $cnn->prepare("INSERT INTO ordenes values(NULL,?,?,?,?,?)");
        

        $query->bindParam(1, $ordenDto->getfecha_venta());
        $query->bindParam(2, $ordenDto->getimpuesto_venta());
        $query->bindParam(3, $ordenDto->gettotal_venta());
        $query->bindParam(4, $ordenDto->getestado_venta());
        $query->bindParam(5, $ordenDto->getid_usuario());
        

        $query->execute();
        $mensaje= "Registro exitoso";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
//modificar ordenes
public function modificarOrden(OrdenDto $ordenDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare("UPDATE ordenes SET fecha_venta=?, impuesto_venta=?, total_venta=?, estado_venta=? , id_usuario=? WHERE id_venta=?");
        $query->bindParam(1, $ordenDto->getfecha_venta());
        $query->bindParam(2, $ordenDto->getimpuesto_venta());
        $query->bindParam(3, $ordenDto->gettotal_venta());
        $query->bindParam(4, $ordenDto->getestado_venta());
        $query->bindParam(5, $ordenDto->getid_usuario());
        $query->bindParam(6, $ordenDto->getid_venta());


        $query->execute();
        $mensaje= "Registro actualizado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
    // obtener Ordenes
public function obtenerOrden($id_venta){
    $cnn = Conexion::getConexion();
    $mensaje = "";
try {
    $query = $cnn->prepare('SELECT * FROM ordenes WHERE id_venta=?');
    $query->bindParam(1, $id_venta);
    $query->execute();
    return $query->fetch();

} catch (Exception  $ex) {
    $mensaje= $ex->getMessage();
}
$cnn= null;
return $mensaje;
}

//eliminar Ordenes
public function eliminarOrden($id_venta){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare('DELETE FROM ordenes WHERE id_venta= ?');
        $query->bindParam(1, $id_venta);
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
            $listarOrden = 'SELECT * from ordenes';
            $query = $cnn->prepare($listarOrden);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception  $ex) {
            echo 'Error'. $ex->getMessage();
        }
    }
}

?>