<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">CorpFreshh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contacto.html">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="nosotros.html">Nosotros</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de Productos -->
    <div class="container mt-3">
        <h2 class="text-center mb-4">Productos</h2>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            // Consulta para obtener productos
            $sql = "SELECT id_producto, nombre_producto, precio_producto, imagen_producto FROM producto";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Usa los nombres correctos de las columnas
                    $id = $row['id_producto'];
                    $nombre = $row['nombre_producto'];
                    $precio = $row['precio_producto'];
                    $imagen = !empty($row['imagen_producto']) ? $row['imagen_producto'] : 'imagenes/default.jpg'; // Imagen por defecto si está vacía
                    
                    echo "<div class='col'>
                            <div class='card h-100'>
                                <img src='".htmlspecialchars($imagen)."' class='card-img-top' alt='".htmlspecialchars($nombre)."'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".htmlspecialchars($nombre)."</h5>
                                    <p class='fw-bold'>$".number_format($precio, 0)."</p>
                                    <a href='visualizar.php?id=".htmlspecialchars($id)."' class='btn btn-dark'>Ver Producto</a>
                                </div>
                            </div>
                          </div>";
                }
            } else {
                echo "<p class='text-center'>No hay productos disponibles.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark pt-5 pb-4">
        <!-- Footer original -->
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
