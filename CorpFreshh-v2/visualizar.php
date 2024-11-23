<?php 
include 'conexion.php'; 

// Verifica si el ID está presente en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los detalles del producto
    $sql = "SELECT id_producto, nombre_producto, descripcion_producto, color_producto, precio_producto, imagen_producto, nombre_marca, talla 
            FROM producto 
            WHERE id_producto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);  // "i" significa que es un valor entero
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica si se encontró el producto
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        // Redirecciona o muestra un mensaje si el producto no existe
        echo "<script>alert('Producto no encontrado.'); window.location.href='productos.php';</script>";
        exit();
    }
} else {
    // Redirecciona si el ID no está presente o es inválido
    echo "<script>alert('ID de producto no válido.'); window.location.href='productos.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
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
                        <a class="nav-link active" href="productos.html">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contancto.html">Contacto</a>
                    </li>
                    <li class="nav-item"></li>
                        <a class="nav-link active" href="nosotros.html">Nosotros</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
                <a href="busqueda.html" class="ms-2">
                    <img src="imagenes/busqueda-de-lupa.png" id="img-lupa" alt="lupa" width="30px">
                </a>
                <a href="carrito.html" class="ms-2">
                    <img src="imagenes/carrito-de-compras.png" id="img-carrito" alt="carrito" width="30px">
                </a>
                <a href="Crud/login.php" class="ms-2">
                    <img src="imagenes/user.svg" id="img-user" alt="user" width="30px">
                </a>
            </div>
        </div>
    </nav>

    <!-- Sección de Detalles del Producto -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo htmlspecialchars($product['imagen_producto']); ?>" class="img-fluid w-75" alt="<?php echo htmlspecialchars($product['nombre_producto']); ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo htmlspecialchars($product['nombre_producto']); ?></h2>
                <p class="h3 mb-4">$<?php echo number_format($product['precio_producto'], 2); ?></p>
                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($product['descripcion_producto']); ?></p>
                <p><strong>Color:</strong> <?php echo htmlspecialchars($product['color_producto']); ?></p>
                <p><strong>Marca:</strong> <?php echo htmlspecialchars($product['nombre_marca']); ?></p>
                <p><strong>Talla:</strong> <?php echo htmlspecialchars($product['talla']); ?></p>

                <!-- Botón de agregar al carrito -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1">
                </div>
                <button class="btn btn-primary btn-lg mt-3">Añadir al carrito</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
    // Obtener los elementos del DOM
    const emailInput = document.getElementById('email');
    const subscribeBtn = document.getElementById('subscribeBtn');

    // Evento al hacer clic en el botón de suscripción
    subscribeBtn.addEventListener('click', () => {
        const email = emailInput.value.trim();

        // Validar si el campo está vacío
        if (email === "") {
            Swal.fire({
                icon: 'warning',
                title: 'Campo vacío',
                text: 'Por favor, ingresa tu correo electrónico',
                confirmButtonText: 'OK'
            });
        } else {
            // Aquí podrías agregar la lógica para enviar el formulario
            Swal.fire({
                icon: 'success',
                title: '¡Suscripción completada!',
                text: 'Gracias por suscribirte a nuestro boletín',
                confirmButtonText: 'OK'
            });

            // Limpiar el campo de texto después de enviar
            emailInput.value = "";
        }
    });
</script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
