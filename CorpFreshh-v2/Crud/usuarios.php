<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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



    <title>Usuarios</title>
    <script>
    function confirmar(event) {
        event.preventDefault(); // Para evitar que el formulario se envíe directamente al action
        const link = event.currentTarget.href;
        Swal.fire({
            icon: 'warning',
            title: '¿Estas seguro de eliminar el registro?',
            text: 'Esa acción no se puede deshacer',
            background: '#f7f7f7',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí,eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
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
                    <a href="usuarios.php">Corp Freshh</a>
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
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
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
            <h1 class="text-center">Gestión de Usuarios</h1>
            <div class="container-fluid">
                <div class="row">

                    <main >
                        <div class="table-responsive">
                            <table class="  table table-container table-striped table-hover table-bordered table-responsive mt-4  "id="table">
                                <thead class="table-dark light-header">
                                    <tr class="text-center">
                                        <th style="font-weight:normal">ID</th>
                                        <th style="font-weight:normal">Nombre</th>
                                        <th style="font-weight :normal">Apellido</th>
                                        <th style="font-weight :normal">Telefono</th>
                                        <th style="font-weight :normal">Correo</th>
                                        <th style="font-weight :normal">Direccion1</th>
                                        <th style="font-weight :normal">direccion2</th>
                                        <th style="font-weight :normal">Ciudad</th>
                                        <th style="font-weight :normal">Pais</th>
                                        <th style="font-weight :normal">Contraseña</th>
                                        <th style="font-weight :normal">ID_Rol</th>
                                        <th style="font-weight :normal">Modificar</th>
                                        <th style="font-weight :normal">Eliminar</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                require 'ModeloDAO/UsuarioDao.php';
                require 'ModeloDTO/UsuarioDto.php';
                require 'Utilidades/conexion.php';

                $uDao = new UsuarioDao();
                $allUsers = $uDao->listarTodos();
                foreach($allUsers as $user){?>
                                    <tr class="text-center">
                                        <td><?php echo $user['id_usuario'];?></td>
                                        <td><?php echo $user['nombre_usuario'];?></td>
                                        <td><?php echo $user['apellido_usuario'];?></td>
                                        <td><?php echo $user['telefono_usuario'];?></td>
                                        <td><?php echo $user['correo_usuario'];?></td>
                                        <td><?php echo $user['direccion1_usuario'];?></td>
                                        <td><?php echo $user['direccion2_usuario'];?></td>
                                        <td><?php echo $user['ciudad_usuario'];?></td>
                                        <td><?php echo $user['pais_usuario'];?></td>
                                        <td><?php echo $user['contraseña'];?></td>
                                        <td><?php echo $user['id_rol'];?></td>
                                        <td><a href="Modificar/modificar.php?id=<?php echo $user['id_usuario']; ?>"> <i
                                                    class="lni lni-pencil-alt"></i></a></td>
                                        <td><a href="controladores/controlador.usuarios.php?id=<?php echo $user['id_usuario'];?>
                    " onclick=" return confirmar(event);">
                                                <i class="lni lni-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                } ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="text-left">
                            <a href="registro.php" class="btn btn-danger"> Registrarse </a>
                            <a href="index.php" class="btn btn-success"> Regresar </a>
                            <a href="reporte.php" class="btn btn-warning">Reporte </a>
                        </div>
                    </main>
                </div>
            </div>



            <?php
    if(isset($_GET['mensaje'])){ ?>
            <div class="row"> <br><br>
                <div class="col-md-6"></div>
                <div class="col-md-4 text-center">
                    <h4><?php echo $mensaje = $_GET['mensaje']?>
                    </h4>
                </div>
                <div class="col-md-5"></div>
            </div>

            <?php
    }
    ?>


        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
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

</html>