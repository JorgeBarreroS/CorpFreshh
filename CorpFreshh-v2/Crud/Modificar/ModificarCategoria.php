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
            require '../ModeloDAO/CategoriaDao.php';
            require '../ModeloDTO/CategoriaDto.php';
            require '../Utilidades/conexion.php';

            if($_GET['id']!=NULL){
                $uDao = new CategoriaDao();
                $usuario = $uDao->obtenerCategoria($_GET['id']);
                }
            ?>

            <form action="../controladores/controlador.categoria.php" method="POST">
                <h3 class="text-center mt-4">MODIFICAR Categoria</h3>
                <label for="">ID</label>
                <input type="text" name="id_categoria" value="<?php echo $usuario['id_categoria'];?>" class="form-control">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre_categoria" value="<?php echo $usuario['nombre_categoria'];?>" class="form-control">
                <br>
            

                <!--nuevo  -->
                <div class="d-flex justify-content-center">
                    <input type="submit" name="modificar" id="modificar" value="Modificar" class="btn btn-primary">
                    <a href="../categoria.php" class="btn btn-info btn-block mx-2 ">Inicio</a>
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