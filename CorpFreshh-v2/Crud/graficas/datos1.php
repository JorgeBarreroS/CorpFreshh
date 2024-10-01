<?php
header('Content-Type: application/json');

// require 'utilidades/conexion.php'; //  conexión 
require 'conexion2.php';
$pdo = Conexion::getConexion();

$data = array();

// Consulta para obtener datos 
$query = "SELECT fecha_venta, SUM(total_venta) as total_ventas FROM ordenes where month(fecha_venta) GROUP BY FECHA_VENTA ORDER BY FECHA_VENTA limit 12";
$stmt = $pdo->prepare($query);
$stmt->execute();

// traer los datos
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Datos en  JSON
echo json_encode($data);
?>
