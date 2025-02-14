<?php
session_start(); // Inicia una nueva sesión o reanuda la sesión existente.

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "curso";
$dbname = "gestion_tareas";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error()); // Verifica si la conexión falló y muestra un mensaje de error.
}

$alertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE nombre_usuario = '$nombre'");
    $nr = mysqli_num_rows($query);

    if ($nr == 1) {
        $row = mysqli_fetch_assoc($query);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario'] = $nombre;
            if (isset($_COOKIE['accept_cookies']) && $_COOKIE['accept_cookies'] == 'true') {
                setcookie("usuario", $nombre, time() + (86400 * 30), "/", "", true, true); // Establece una cookie con el nombre del usuario si las cookies son aceptadas.
            }
            session_regenerate_id(true); // Regenera el ID de sesión para prevenir ataques de fijación de sesión.
            header("Location: ../Tareas/tareas.php"); // Redirige al usuario a tareas.php después de un inicio de sesión exitoso.
            exit();
        } else {
            $alertMessage = "Contraseña incorrecta."; // Muestra un mensaje de error si la contraseña es incorrecta.
        }
    } else {
        $alertMessage = "Usuario no encontrado."; // Muestra un mensaje de error si el usuario no es encontrado.
    }
}

mysqli_close($conn); // Cierra la conexión a la base de datos.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card p-4 shadow-lg" style="width: 25rem;">
        <div class="card-body">
            <h3 class="card-title text-center text-primary mb-4">Inicio de sesión</h3>
            <div class="text-center mb-3">
                <img src="Imagenes/usuarios.jpg" alt="Candado" class="img-fluid" style="width: 80px;">
            </div>

            <?php if (!empty($alertMessage)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $alertMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form method="post" action="login.php">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="txtusuario" id="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtpassword" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            <div class="text-center mt-3">
                <a href="registro.php" class="btn btn-secondary w-100">Registrar</a>
            </div>
        </div>
    </div>

    <!-- Mensaje para aceptar o denegar cookies -->
    <div id="cookieConsent" class="fixed-bottom bg-light p-3 border-top shadow-lg">
        <div class="d-flex justify-content-between align-items-center">
            <span>Este sitio web utiliza cookies para mejorar su experiencia. ¿Acepta el uso de cookies?</span>
            <div>
                <button class="btn btn-secondary btn-sm" id="denyCookies">Denegar</button>
                <button class="btn btn-primary btn-sm" id="acceptCookies">Aceptar</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (!document.cookie.includes('accept_cookies=true') && !document.cookie.includes('accept_cookies=false')) {
                document.getElementById('cookieConsent').style.display = 'block'; // Muestra el mensaje de consentimiento de cookies.
            }

            document.getElementById('acceptCookies').addEventListener('click', function () {
                document.cookie = "accept_cookies=true; path=/; max-age=" + (30*24*60*60); // Establece una cookie indicando que el usuario ha aceptado las cookies.
                document.getElementById('cookieConsent').style.display = 'none'; 
            });

            document.getElementById('denyCookies').addEventListener('click', function () {
                document.cookie = "accept_cookies=false; path=/; max-age=" + (30*24*60*60); // Establece una cookie indicando que el usuario ha denegado las cookies.
                document.getElementById('cookieConsent').style.display = 'none'; 
            });
        });
    </script>
</body>
</html>