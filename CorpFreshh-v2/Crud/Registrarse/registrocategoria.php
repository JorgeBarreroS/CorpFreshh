<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">  
    <script src="../../js/bootstrap.min.js"></script>
    <link href="../../css/dashboard.css" rel="stylesheet">
    <title>REGISTRO</title>
</head>
<body class="container m-0 row justify-content-center">
<div class="container-fluid">
      
            <main class="main col ">
                <h2>Registro de Categoria </h2>
                <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6 mt-4">
            <form action="../controladores/controlador.categoria.php" method="POST">
                <h3 class="text-center">REGISTRO</h3>
                <label for="">ID</label>
                <input type="text" name="id_categoria" class="form-control">
                <br>
                <label for="">Nombre</label>
                <input type="text" name="nombre_categoria" class="form-control">
                <br>
              

                    <!--nuevo  -->
                <div class="d-flex justify-content-center">
                <input type="submit" name="registro" id="registro" value="Registrarse" class="btn btn-primary">
                <a href="index.php" class="btn btn-info btn-block mx-2 ">Inicio</a>
                </div>
            </form>

            
        </div>
        
        <div class="col-md-6 mt-4"></div>
    </div>
    <div class="row">
                    <div class="col-md-12 text-center mt-4">
                        <a href="listado.php" class="btn btn-secondary  w-25 ms-auto">Consultar</a>
                    </div>
                </div>
</main>
        </div>
    </div>

  

    <?php 
    if(isset($_GET['mensaje'])){
        ?>

        <div class="row"> <br><br>
            <div class="col-md-6"></div>
            <div class="col-md-4 text-center"><h4><?php echo $mensaje = $_GET['mensaje']?>
            </h4></div>
            <div class="col-md-5"></div>
                   </div>
        <?php 
          }
?>
<div></div>


</body>
</html>