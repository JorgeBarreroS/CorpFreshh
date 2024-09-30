<?php

class PedidoDao{

    public function registrarPedido(PedidoDto $pedidoDto){
    $cnn = Conexion::getConexion();
    $mensaje = ""; 

    try {
        $query = $cnn->prepare("INSERT INTO pedido values(NULL,?,?,?,?,?)");
        

        $query->bindParam(1, $pedidoDto->getid_venta());
        $query->bindParam(2, $pedidoDto->getid_usuario());
        $query->bindParam(3, $pedidoDto->getfecha_pedido());
        $query->bindParam(4, $pedidoDto->getestado_pedido());
        $query->bindParam(5, $pedidoDto->getmetodo_envio_pedido());
        

        $query->execute();
        $mensaje= "Registro exitoso";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
//modificar pedidos
public function modificarPedido(PedidoDto $pedidoDto){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare("UPDATE pedido SET id_venta=?, id_usuario=?, fecha_pedido=?, estado_pedido=? , metodo_envio_pedido=? WHERE id_pedido=?");
        $query->bindParam(1, $pedidoDto->getid_venta());
        $query->bindParam(2, $pedidoDto->getid_usuario());
        $query->bindParam(3, $pedidoDto->getfecha_pedido());
        $query->bindParam(4, $pedidoDto->getestado_pedido());
        $query->bindParam(5, $pedidoDto->getmetodo_envio_pedido());
        $query->bindParam(6, $pedidoDto->getid_pedido());

        $query->execute();
        $mensaje= "Registro actualizado";
    } catch (Exception  $ex) {
        $mensaje= $ex->getMessage();
    }
    $cnn= null;
    return $mensaje;
    }
    // obtener listarPedido
public function obtenerPedido($id_pedido){
    $cnn = Conexion::getConexion();
    $mensaje = "";
try {
    $query = $cnn->prepare('SELECT * FROM pedido WHERE id_pedido=?');
    $query->bindParam(1, $id_pedido);
    $query->execute();
    return $query->fetch();

} catch (Exception  $ex) {
    $mensaje= $ex->getMessage();
}
$cnn= null;
return $mensaje;
}

//eliminar pedidos
public function eliminarPedido($id_pedido){
    $cnn = Conexion::getConexion();
    $mensaje = "";
    try {
        $query = $cnn->prepare('DELETE FROM pedido WHERE id_pedido= ?');
        $query->bindParam(1, $id_pedido);
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
            $listarPedido = 'SELECT * from pedido';
            $query = $cnn->prepare($listarPedido);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception  $ex) {
            echo 'Error'. $ex->getMessage();
        }
    }
}

?>