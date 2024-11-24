<?php 
include 'conexion.php'; 

// Establecemos el número de productos por página
$productos_por_pagina = 10;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $productos_por_pagina;

// Filtrar por categoría si se selecciona alguna
$categoria = isset($_GET['categoria']) ? (int)$_GET['categoria'] : 0;

// Consulta para obtener categorías disponibles
$sql_categoria = "SELECT * FROM categoria";
$result_categoria = $conn->query($sql_categoria);

// Consulta para obtener productos
$sql = "SELECT p.id_producto, p.nombre_producto, p.precio_producto, p.imagen_producto, 
        c.nombre_categoria, c.id_categoria
        FROM producto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        WHERE (0 = ? OR p.id_categoria = ?)
        LIMIT ? OFFSET ?";

// Usar prepared statements para mayor seguridad
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $categoria, $categoria, $productos_por_pagina, $offset);
$stmt->execute();
$result = $stmt->get_result();

// Consulta para contar el total de productos
$sql_count = "SELECT COUNT(*) as total 
              FROM producto p
              LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
              WHERE (0 = ? OR p.id_categoria = ?)";
              
$stmt_count = $conn->prepare($sql_count);
$stmt_count->bind_param("ii", $categoria, $categoria);
$stmt_count->execute();
$count_result = $stmt_count->get_result();
$total_productos = $count_result->fetch_assoc()['total'];
$total_paginas = ceil($total_productos / $productos_por_pagina);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - CorpFreshh</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .product-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .category-filter {
            margin-bottom: 30px;
        }
        .form-select:focus {
            border-color: #212529;
            box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.25);
        }
        .category-count {
            font-size: 0.875rem;
            color: #6c757d;
            margin-left: 0.5rem;
        }
        .breadcrumb {
            background-color: #f8f9fa;
            padding: 0.75rem 1rem;
            border-radius: 0.25rem;
        }
        .breadcrumb-item a {
            color: #212529;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            text-decoration: underline;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .input-group-text {
            min-width: 100px;
        }
        .card {
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-dark {
            transition: all 0.3s ease;
        }
        .btn-dark:hover {
            background-color: #343a40;
            transform: scale(1.05);
        }
    </style>
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
                        <a class="nav-link active" href="contancto.html">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="nosotros.html">Nosotros</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <a href="busqueda.php" class="ms-2">
                    <img src="imagenes/busqueda-de-lupa.png" id="img-lupa" alt="lupa" width="30px">
                </a>
                <a href="carrito.php" class="ms-2">
                    <img src="imagenes/carrito-de-compras.png" id="img-carrito" alt="carrito" width="30px">
                </a>
                <a href="Crud/login.php" class="ms-2">
                    <img src="imagenes/user.svg" id="img-user" alt="user" width="30px">
                </a>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Nuestros Productos</h2>
                    <div class="col-md-4">
                        <form method="GET" action="productos.php" class="d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white border-dark">
                                    <i class="fas fa-filter"></i> Categoría
                                </span>
                                <select class="form-select border-dark" id="categoria" name="categoria" onchange="this.form.submit()">
                                    <option value="0">Todas las categorías</option>
                                    <?php while ($categoria_row = $result_categoria->fetch_assoc()) { ?>
                                        <option value="<?php echo htmlspecialchars($categoria_row['id_categoria']); ?>" 
                                                <?php echo ($categoria == $categoria_row['id_categoria']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($categoria_row['nombre_categoria']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="productos.php">Productos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php
                            if ($categoria == 0) {
                                echo "Todas las categorías";
                            } else {
                                $result_categoria->data_seek(0);
                                while ($cat = $result_categoria->fetch_assoc()) {
                                    if ($cat['id_categoria'] == $categoria) {
                                        echo htmlspecialchars($cat['nombre_categoria']);
                                        break;
                                    }
                                }
                            }
                            ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Productos Grid -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id_producto'];
                    $nombre = $row['nombre_producto'];
                    $precio = $row['precio_producto'];
                    $imagen = !empty($row['imagen_producto']) ? $row['imagen_producto'] : 'imagenes/default.jpg';
                    
                    echo "<div class='col'>
                            <div class='card h-100'>
                                <img src='".htmlspecialchars($imagen)."' class='product-img' alt='".htmlspecialchars($nombre)."'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".htmlspecialchars($nombre)."</h5>
                                    <p class='fw-bold'>$".number_format($precio, 0)."</p>
                                    <a href='visualizar.php?id=".htmlspecialchars($id)."' class='btn btn-dark w-100'>Ver Producto</a>
                                </div>
                            </div>
                          </div>";
                }
            } else {
                echo "<div class='col-12 text-center'>
                        <div class='alert alert-info' role='alert'>
                            <i class='fas fa-info-circle me-2'></i>
                            No hay productos disponibles en esta categoría.
                        </div>
                      </div>";
            }
            ?>
        </div>

        <!-- Paginación -->
        <?php if ($total_paginas > 1): ?>
        <nav aria-label="Navegación de páginas" class="my-4">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>&categoria=<?php echo $categoria; ?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <li class="page-item <?php echo ($pagina_actual == $i) ? 'active' : ''; ?>">
                        <a class="page-link" href="?pagina=<?php echo $i; ?>&categoria=<?php echo $categoria; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>&categoria=<?php echo $categoria; ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark pt-5 pb-4 mt-5">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <!-- Enlaces útiles -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Enlaces útiles</h5>
                    <p><a href="#" class="text-dark">Inicio</a></p>
                    <p><a href="#" class="text-dark">Acerca de nosotros</a></p>
                    <p><a href="#" class="text-dark">Contacto</a></p>
                </div>

                <!-- Contacto -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Contacto</h5>
                    <p><i class="fas fa-phone me-2"></i> +123456789</p>
                    <p><i class="fas fa-envelope me-2"></i> info@corpfreshh.com</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Calle Principal, Ciudad</p>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">Redes sociales</h5>
                    <p><a href="#" class="text-dark"><i class="fab fa-facebook me-2"></i>Facebook</a></p>
                    <p><a href="#" class="text-dark"><i class="fab fa-twitter me-2"></i>Twitter</a></p>
                    <p><a href="#" class="text-dark"><i class="fab fa-instagram me-2"></i>Instagram</a></p>
                    <p><a href="#" class="text-dark"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></p>
                </div>

                <!-- Newsletter -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold">CorpFreshh</h5>
                    <p>Suscríbete a nuestro boletín informativo</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tu correo electrónico" aria-label="Email">
                        <button class="btn btn-dark" type="button">Suscribirse</button>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row align-items-center mt-4">
                <div class="col-md-12 text-center">
                    <p class="text-dark mb-0">&copy; 2024 CorpFreshh. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>