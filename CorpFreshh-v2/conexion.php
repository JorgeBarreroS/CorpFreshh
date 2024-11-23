<?php
$servername = "localhost";
$username = "root"; // Cambia según tu configuración
$password = ""; // Tu contraseña de la base de datos
$dbname = "corpfreshh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
