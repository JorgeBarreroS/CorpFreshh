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
    <title>Ordenes</title>
    <link rel=" stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sytles2.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
            <!-- jquery -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- datatables css y js -->
    <link href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
 function confirmar(event) {
        event.preventDefault(); // Evita la acción predeterminada del enlace
        const link = event.currentTarget.href; // Obtiene la URL del enlace

        Swal.fire({
            title: '¿Estás seguro de eliminar este registro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745', // Color verde para el botón de confirmar
            cancelButtonColor: '#6c757d', // Color gris para el botón de cancelar
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn btn-success', // Clase de Bootstrap para el botón de confirmar
                cancelButton: 'btn btn-secondary' // Clase de Bootstrap para el botón de cancelar
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link; // Redirige a la URL si se confirma
            }
        });
    }
</script>
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
        <?php 
if (isset($_GET['mensaje'])){
    ?>
    <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
        <?php echo htmlspecialchars($_GET['mensaje']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

        <main>
                <h2 class="text-center">Gestión de Ordenes</h2>
                <div class="table-responsive">
                <div class="table-container">
                <table class="  table table-container table-striped table-hover table-bordered table-responsive mt-4  " id="table">
                        <thead class="table-dark table light-header">
                            <tr class="text-center">
                                <th style="font-weight: normal">ID</th>
                                <th style="font-weight: normal">Fecha</th>
                                <th style="font-weight: normal">Impuesto</th>
                                <th style="font-weight: normal">Total</th>
                                <th style="font-weight: normal">Estado</th>
                                <th style="font-weight: normal">User</th>
                                <th style="font-weight: normal">Modificar</th>
                                <th style="font-weight: normal">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            require 'ModeloDAO/OrdenDao.php';
                            require 'ModeloDTO/OrdenDto.php';
                            require 'Utilidades/conexion.php';
                            $uDao = new OrdenDao();
                            $allusers = $uDao->listarTodos(); 
                            foreach($allusers as $user){ ?>

                            <tr class="text-center">
                                <td> <?php echo $user['id_venta'];?></td>
                                <td> <?php echo $user['fecha_venta'];?></td>
                                <td> <?php echo $user['impuesto_venta'];?></td>
                                <td> <?php echo $user['total_venta'];?></td>
                                <td> <?php echo $user['estado_venta'];?></td>
                                <td> <?php echo $user['id_usuario'];?></td>

                                <td><a href="Modificar/ModificarOrden.php?id=<?php echo $user['id_venta']; ?>">
                                        <i class="lni lni-pencil-alt"></i></a></td>
                                <td><a href="controladores/controlador.orden.php?id=<?php echo $user['id_venta'];?>
                                 " onclick=" return confirmar(event);">
                                        <i class="lni lni-trash-can"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
                </div>
                <div class="text-left">
                    <a href="Registrarse/registroorden.php" class="btn btn-danger "> Registrarse</a>
                    <a href="reporte.php" class="btn btn-warning "> Reporte </a>
                </div>


            </main>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    const hamBurger = document.querySelector(".toggle-btn");

    hamBurger.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("expand");
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ entradas",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Ver entradas del _START_ al _END_ de _TOTAL_ entradas",
                "sInfoEmpty": "Ver entradas del 0 al 0 de 0 entradas",
                "sInfoFiltered": "(filtrado de _MAX_ entradas en total)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
    </script>
</body>
