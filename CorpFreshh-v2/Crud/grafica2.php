<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    // Si no ha iniciado sesión, redirigir a la página de login
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sytles2.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        data-bs-target="#ordenesMenu" aria-expanded="false" aria-controls="ordenesMenu">
                        <i class="lni lni-bar-chart"></i>
                        <span>Reportes</span>
                    </a>
                    <ul id="ordenesMenu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
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
            <div class="container-fluid">
                <div class="row">
                    <div class="logo">
                        <h2 id="opciones" class="py-4 m-0">Reporte cantidad producto</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9" role="main">
                        <div class="container py-4">
                            <div class="row mt4">
                                <h2 id="reporte-de-ventas" class="text-center fw-light fs-6"></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <canvas id="chart1"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("expand");
    });

    async function fetchData() {
            try {
                // Llamada al archivo PHP para obtener los datos
                const response = await fetch('./graficas/datos2.php');
                const data = await response.json();

                // Procesar los datos para los gráficos
                const labels = data.map(item => item.id_producto);
                const values = data.map(item => item.Cantidad_Producto);

                // Primer gráfico
                const ctx1 = document.getElementById('chart1').getContext('2d');
                new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'cantidad vendia por productos',
                            data: values,
                            backgroundColor: 'rgba(0, 100, 0, 0.2)',
                            borderColor: 'rgba(0, 100, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Segundo gráfico 
                const ctx2 = document.getElementById('chart2').getContext('2d');
                new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Ventas',
                            data: values,
                            backgroundColor: 'rgba(0, 191, 255, 0.2)',
                            borderColor: 'rgba(0, 191, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            } catch (error) {
                console.error('Error al obtener los datos:', error);
            }
        }

    document.addEventListener('DOMContentLoaded', fetchData);
    </script>
</body>

</html>