<?php
session_start();
if(isset($_SESSION['nombre'])){
    header(header: 'Location.index.php');
}
header(header: "Cache-Control: no-cache, no-store, must-revalidate");
header(header: 'Pragma:no-cache');
header(header: "Expires:0");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido a corp-freshh!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sytles.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container login-container">
        <div class="login-header">
            <img src="img/corp-freshh.jfif" alt="Corp Freshh">
            <h2 class="fw-bold">¡Bienvenido a CorpFreshh!</h2>
        </div>

        <!-- Formulario de inicio de sesión -->
        <form action="loginproceso.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="txtUsu" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="txtPass" id="txtPass" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" onclick="verpassword()">
                <label class="form-check-label small-text"  >Mostrar contraseña</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>

        <div class="text-center mt-3 small-text">
            <p>No tienes cuenta? <a href="Registro.html">Regístrate</a></p>
            <p>¿Olvidaste tu contraseña? <a href="Recuperarcontraseña.html">Recuperar Contraseña</a></p>
            <p><a href="../index.html">Página Principal</a></p>
        </div>

        <!-- Redes sociales -->
        <div class="social-login text-center">
            <p class="small-text">O inicia sesión con:</p>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-outline-primary w-100">
                        <img src="img/facebook.png" alt="Facebook" width="20">
                        Facebook
                    </button>
                </div>
                <div class="col-6">
                    <button class="btn btn-outline-danger w-100">
                        <img src="img/Google.png" alt="Google" width="20">
                        Google
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
if (isset($_GET['error']) && $_GET['error'] == 1){
    echo "<script> 
    Swal.fire({
        icon: 'error',
        title: 'Inicio no válido',
        text: 'Usuario o contraseña son incorrectos, intenta nuevamente',
        background: '#f7f7f7',
        confirmButtonColor: '#3085d6',
         confirmButtonText: 'Volver a intentar',
        customClass: {
            title:'swal-title',
            popup: 'swal-popup',
        }
    });
    </script>";
}
?>
<script>

function verpassword()
  {
  var tipo = document.getElementById("txtPass");
    if(tipo.type == "password")
	  {
        tipo.type = "text";
      }
	  else
	  {
        tipo.type = "password";
      }
  }
</script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </script>
    

</body>

</html>