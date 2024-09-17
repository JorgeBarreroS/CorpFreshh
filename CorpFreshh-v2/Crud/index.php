<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit(); }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel=" stylesheet" href="css/bootstrap.min.css">
</head>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-6">
            <h1 class="text-center">CRUD</h1>
            <h2 class="text-center">Bienvenid@ <?php echo $_SESSION['correo']?></h2>
            <div class="text-center">
                <a href="cerrarsesion.php">Cerrar Sesión</a>
            </div>
            
        </div>
    </div>
</div>
</body>

</html>