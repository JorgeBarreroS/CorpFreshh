<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    // Si no ha iniciado sesión, redirigir a la página de login
    header('Location: login.php');
    exit();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel=" stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sytles2.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
    <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="index.php">Corp Freshh</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="usuarios.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#productosMenu" aria-expanded="false" aria-controls="productosMenu">
                        <i class="lni lni-t-shirt"></i>
                        <span>Inventario</span>
                    </a>
                    <ul id="productosMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="productos.php" class="sidebar-link">Productos</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="categoria.php" class="sidebar-link">Categorias</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#ordenesMenu" aria-expanded="false" aria-controls="ordenesMenu">
                        <i class="lni lni-cart-full"></i>
                        <span>Órdenes y Ventas</span>
                    </a>
                    <ul id="ordenesMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="ordenes.php" class="sidebar-link">Órdenes</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="pedidos.php" class="sidebar-link">Pedidos</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="notificaciones.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notificaciones</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="ajustesperf.php" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Ajustes</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="cerrarsesion.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
           #Notificaciones
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("expand");
    });
    </script>
</body>

</html>