<?php
include 'conexion.php';

// Procesar búsqueda o mostrar productos iniciales
$productos = [];
if (isset($_GET['q']) && !empty($_GET['q'])) {
    // Buscar productos según el término
    $busqueda = $_GET['q'];
    $sql = "SELECT id_producto, nombre_producto, precio_producto, imagen_producto 
            FROM producto 
            WHERE nombre_producto LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $busqueda . '%';
    $stmt->bind_param('s', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($producto = $result->fetch_assoc()) {
        $productos[] = $producto;
    }
} else {
    // Mostrar los primeros 5 productos
    $sql = "SELECT id_producto, nombre_producto, precio_producto, imagen_producto 
            FROM producto 
            LIMIT 5";
    $result = $conn->query($sql);
    while ($producto = $result->fetch_assoc()) {
        $productos[] = $producto;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_buscador.css">
</head>
<body>
    <!-- Botón de cerrar (X) -->
    <button class="close-button" onclick="window.location.href='index.html'">×</button>

    <!-- Buscador -->
    <div class="search-container">
        <form method="get" class="search-bar">
            <input type="text" name="q" id="searchInput" placeholder="Buscar" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
            <button type="submit">
                <img src="./imagenes/busqueda-de-lupa.png" alt="Buscar" width="20">
            </button>
        </form>
    </div>

    <!-- Productos -->
    <div class="products-container">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="product-card">
                    <img src="<?= htmlspecialchars($producto['imagen_producto']) ?>" alt="<?= htmlspecialchars($producto['nombre_producto']) ?>">
                    <h3><?= htmlspecialchars($producto['nombre_producto']) ?></h3>
                    <p>Precio: $<?= number_format($producto['precio_producto'], 2) ?></p>
                    <button onclick="verProducto(<?= $producto['id_producto'] ?>)">Ver Producto</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>

    <script>
        function verProducto(id) {
            // Redirige a la página del producto (implementa esto en tu proyecto)
            window.location.href = `visualizar.php?id=${id}`;
        }
    </script>
</body>
</html>
