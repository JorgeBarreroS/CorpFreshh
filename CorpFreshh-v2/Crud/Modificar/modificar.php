<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Modificar</title>
</head>

<body>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php
            require '../ModeloDAO/UsuarioDao.php';
            require '../ModeloDTO/UsuarioDto.php';
            require '../Utilidades/conexion.php';

            if($_GET['id']!=NULL){
                $uDao = new UsuarioDao();
                $usuario = $uDao->obtenerUsuario($_GET['id']);
                }
            ?>

            <form action="controladores/controlador.usuarios.php" method="POST">
                <h3 class="text-center mt-4">MODIFICAR USUARIO</h3>
                <label for="">Documento</label>
                <input type="text" name="documento" value="<?php echo $usuario['id_usuario'];?>" class="form-control">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $usuario['nombre_usuario'];?>" class="form-control">
                <br>
                <label for="">Apellido</label>
                <input type="text" name="apellido" value="<?php echo $usuario['apellido'];?>" class="form-control">
                <br>
                <label for="">Dirección</label>
                <input type="text" name="direccion" value="<?php echo $usuario['direccion'];?>" class="form-control">
                <br>
                <label for="">Clave</label>
                <input type="password" name="clave" value="<?php echo $usuario['clave'];?>" class="form-control">
                <br>

                <!--nuevo  -->
                <div class="d-flex justify-content-center">
                    <input type="submit" name="modificar" id="modificar" value="Modificar" class="btn btn-primary">
                    <a href="index.php" class="btn btn-info btn-block mx-2 ">Inicio</a>
                </div>
            </form>

        </div>
        <div class="col-md-4 mt-4"></div>
    </div>

    <?php
    if(isset($_GET['mensaje'])){
        ?>

    <div class="row"> <br><br>
        <div class="col-md-6"></div>
        <div class="col-md-4 text-center">
            <h4><?php echo $mensaje = $_GET['mensaje']?>
            </h4>
        </div>
        <div class="col-md-5"></div>
    </div>

    <?php } ?>

</body>

</html>