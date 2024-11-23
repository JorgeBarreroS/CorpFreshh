<?php 
session_start();
include 'conexion.php'; 

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verifica si el ID está presente en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT id_producto, nombre_producto, descripcion_producto, color_producto, precio_producto, imagen_producto, nombre_marca, talla 
            FROM producto 
            WHERE id_producto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<script>alert('Producto no encontrado.'); window.location.href='productos.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID de producto no válido.'); window.location.href='productos.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['nombre_producto']); ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <a href="busqueda.html" class="ms-2">
                    <img src="imagenes/busqueda-de-lupa.png" id="img-lupa" alt="lupa" width="30px">
                </a>
                <a href="carrito.php" class="ms-2">
                    <img src="imagenes/carrito-de-compras.png" id="img-carrito" alt="carrito" width="30px">
                    <?php if (!empty($_SESSION['carrito'])): ?>
                        <span class="badge bg-danger"><?php echo count($_SESSION['carrito']); ?></span>
                    <?php endif; ?>
                </a>
                <a href="Crud/login.php" class="ms-2">
                    <img src="imagenes/user.svg" id="img-user" alt="user" width="30px">
                </a>
            </div>
        </div>
    </nav>

    <!-- Detalles del Producto -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($product['imagen_producto']); ?>" 
                     class="img-fluid w-75" 
                     alt="<?php echo htmlspecialchars($product['nombre_producto']); ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo htmlspecialchars($product['nombre_producto']); ?></h2>
                <p class="h3 mb-4">$<?php echo number_format($product['precio_producto'], 2); ?></p>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($product['descripcion_producto']); ?></p>
                <p><strong>Color:</strong> <?php echo htmlspecialchars($product['color_producto']); ?></p>
                <p><strong>Marca:</strong> <?php echo htmlspecialchars($product['nombre_marca']); ?></p>
                <p><strong>Talla:</strong> <?php echo htmlspecialchars($product['talla']); ?></p>

                <!-- Formulario de agregar al carrito -->
                <form id="addToCartForm" class="needs-validation" novalidate>
                    <input type="hidden" name="id_producto" value="<?php echo $product['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($product['nombre_producto']); ?>">
                    <input type="hidden" name="precio" value="<?php echo $product['precio_producto']; ?>">
                    <input type="hidden" name="imagen" value="<?php echo htmlspecialchars($product['imagen_producto']); ?>">
                    
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad:</label>
                        <input type="number" 
                               class="form-control" 
                               id="quantity" 
                               name="cantidad" 
                               value="1" 
                               min="1" 
                               required>
                        <div class="invalid-feedback">
                            Por favor ingrese una cantidad válida
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Añadir al carrito</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-light text-dark pt-5 pb-4">
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
                <p><i class="fas fa-phone mr-3"></i> +123456789</p>
                <p><i class="fas fa-envelope mr-3"></i> info@tuempresa.com</p>
                <p><i class="fas fa-map-marker-alt mr-3"></i> Calle Principal, Ciudad</p>
            </div>

            <!-- Redes sociales -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">Redes sociales</h5>
                <p><a href="#" class="text-dark">Facebook</a></p>
                <p><a href="#" class="text-dark">Twitter</a></p>
                <p><a href="#" class="text-dark">Instagram</a></p>
                <p><a href="#" class="text-dark">LinkedIn</a></p>
            </div>

            <!-- CorpFreshh -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold">CorpFreshh</h5>
                <p>Suscríbete a nuestro boletín informativo para recibir las últimas noticias y ofertas especiales.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="email" placeholder="Tu correo electrónico">
                    <button class="btn btn-primary" type="button" id="subscribeBtn">Suscribirse</button>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="row align-items-center mt-4">
            <div class="col-md-12 text-center">
                <p class="text-dark">&copy; 2024 CorpFreshh. Todos los derechos reservados.</p>
            </div>
        </div>

    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('addToCartForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar el formulario
        if (!this.checkValidity()) {
            e.stopPropagation();
            this.classList.add('was-validated');
            return;
        }
        
        const formData = new FormData(this);
        
        // Mostrar indicador de carga
        Swal.fire({
            title: 'Agregando al carrito...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        fetch('agregar_carrito.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Producto agregado!',
                    text: 'El producto se agregó correctamente al carrito',
                    showConfirmButton: true,
                    confirmButtonText: 'Ver carrito',
                    showCancelButton: true,
                    cancelButtonText: 'Seguir comprando'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'carrito.php';
                    } else {
                        location.reload(); // Actualizar para mostrar el nuevo contador del carrito
                    }
                });
            } else {
                throw new Error(data.message || 'Error al agregar al carrito');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un error al agregar el producto al carrito: ' + error.message
            });
        });
    });
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>