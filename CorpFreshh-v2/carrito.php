<?php
session_start();

// Actualizar cantidad con AJAX
if (isset($_POST['accion']) && $_POST['accion'] === 'actualizar') {
    $id = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    foreach ($_SESSION['carrito'] as &$producto) {
        if ($producto['id_producto'] == $id) {
            $producto['cantidad'] = $cantidad;
            $producto['subtotal'] = $producto['cantidad'] * $producto['precio'];
            break;
        }
    }

    $response = [
        'subtotal' => number_format($producto['subtotal'], 2),
        'total' => number_format(array_sum(array_map(fn($p) => $p['precio'] * $p['cantidad'], $_SESSION['carrito'])), 2)
    ];
    echo json_encode($response);
    exit;
}

// Eliminar un producto del carrito
if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $id = $_POST['id_producto'];

    // Filtrar el carrito para eliminar el producto
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], function ($producto) use ($id) {
        return $producto['id_producto'] != $id;
    });

    // Redirigir para evitar reenvíos
    header('Location: carrito.php');
    exit;
}

// Calcular el total inicial
$total = array_sum(array_map(fn($p) => $p['precio'] * $p['cantidad'], $_SESSION['carrito']));
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .cart-table img {
            width: 80px;
            height: auto;
        }
        .cart-table th, .cart-table td {
            text-align: center;
            vertical-align: middle;
        }
        .cart-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
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
                    <li class="nav-item"></li>
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

    <!-- Contenido del carrito -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Carrito de Compras</h1>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover cart-table">
                    <thead class="table-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrito'] as $producto): ?>
                            <tr data-id="<?php echo $producto['id_producto']; ?>">
                                <td><img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Producto"></td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>
                                    <input type="number" class="form-control cantidad-input text-center" style="width: 80px;" 
                                           value="<?php echo $producto['cantidad']; ?>" min="1">
                                </td>
                                <td class="subtotal">$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                                <td>
                                    <form method="POST" action="carrito.php" class="d-inline">
                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <button type="submit" class="btn btn-danger btn-sm eliminar-btn">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="cart-actions">
                <a href="productos.php" class="btn btn-secondary btn-lg">Seguir Comprando</a>
                <div>
                    <span class="total-price">Total: $<span id="total"><?php echo number_format($total, 2); ?></span></span>
                    <a href="checkout.php" class="btn btn-primary btn-lg">Ir a pagar</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                El carrito está vacío. <a href="productos.php" class="alert-link">Ver productos</a>.
            </div>
        <?php endif; ?>
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

    <script>
        $(document).ready(function () {
            $('.cantidad-input').on('change', function () {
                const row = $(this).closest('tr');
                const idProducto = row.data('id');
                const cantidad = $(this).val();

                if (cantidad <= 0) {
                    Swal.fire('Error', 'La cantidad debe ser mayor a cero.', 'error');
                    return;
                }

                $.post('carrito.php', {
                    accion: 'actualizar',
                    id_producto: idProducto,
                    cantidad: cantidad
                }, function (response) {
                    const data = JSON.parse(response);
                    row.find('.subtotal').text(`$${data.subtotal}`);
                    $('#total').text(data.total);

                    Swal.fire('Actualizado', 'La cantidad ha sido actualizada.', 'success');
                });
            });

            $('.eliminar-btn').on('click', function (e) {
                e.preventDefault();
                const form = $(this).closest('form');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esto eliminará el producto del carrito.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
