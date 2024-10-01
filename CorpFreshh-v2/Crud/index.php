<?php
session_start();

// Verificamos si el usuario ha iniciado sesión comprobando si 'correo' está en la sesión
if (!isset($_SESSION['correo'])) {
    // Si no hay sesión activa, redirigimos al login
    header('Location: login.php');
    exit();
} elseif (isset($_SESSION['correo'])) {
    require 'ModeloDAO/UsuarioDao.php';
    require 'ModeloDTO/UsuarioDto.php';
    require 'Utilidades/conexion.php';
    
    // Verificamos si también está almacenado el ID del usuario en la sesión
    if (isset($_SESSION['id_usuario'])) {
        // Obtenemos el ID del usuario desde la sesión
        $uDao = new UsuarioDao();
        $usuario = $uDao->obtenerUsuario($_SESSION['id_usuario']);  // Obtenemos los datos del usuario
        
        // Verificamos si el usuario fue encontrado
        if ($usuario) {
            $nombre_usuario = $usuario['nombre_usuario'];  // Almacenamos el nombre del usuario
        } else {
            echo "Error: Usuario no encontrado.";
            exit();
        }
    } else {
        echo "Error: ID del usuario no encontrado en la sesión.";
        exit();
    }
} else {
    echo 'Ocurrió un error'; 
    exit();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#repotesMenu" aria-expanded="false" aria-controls="repotesMenu">
                        <i class="lni lni-bar-chart"></i>
                        <span>Reportes</span>
                    </a>
                    <ul id="repotesMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="notificaciones.php" class="sidebar-link">Reporte de venta</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="grafica2.php" class="sidebar-link">Reporte cantidad producto</a>
                        </li>
                    </ul>
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
            <h1 class="text-center">CRUD</h1>

            <!-- Mostramos el nombre del usuario en el mensaje de bienvenida -->
            <h2 class="text-center">Bienvenid@ <?php echo htmlspecialchars($nombre_usuario, ENT_QUOTES, 'UTF-8'); ?>
            </h2>

            <div class="text-center">
                <a href="cerrarsesion.php">Cerrar Sesión</a>
            </div>
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