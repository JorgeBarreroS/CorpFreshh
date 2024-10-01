<?php
header('Content-Type: application/json');

// require 'utilidades/conexion.php'; //  conexión 
require './conexion2.php';
$pdo = Conexion::getConexion();

$data = array();

// Consulta para obtener datos 
$query = "SELECT id_producto, Cantidad_Producto FROM articulos_ordenes where id_producto limit 20";
$stmt = $pdo->prepare($query);
$stmt->execute();

// traer los datos
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Datos en  JSON
echo json_encode($data);
?>
