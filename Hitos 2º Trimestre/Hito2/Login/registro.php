<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "curso";
$dbname = "gestion_tareas";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

$alertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST["txtusuario"];
    $email = $_POST["txtemail"];
    $pass = password_hash($_POST["txtpassword"], PASSWORD_DEFAULT);

    // Verificar si el nombre de usuario ya está registrado
    $query = mysqli_query($conn, "SELECT * FROM users WHERE nombre_usuario = '$nombre'");
    if (mysqli_num_rows($query) > 0) {
        $alertMessage = "El nombre de usuario ya está registrado.";
    } else {
        // Verificar si el correo electrónico ya está registrado
        $query = mysqli_query($conn, "SELECT * FROM users WHERE correo = '$email'");
        if (mysqli_num_rows($query) > 0) {
            $alertMessage = "El correo electrónico ya está registrado.";
        } else {
            $query = "INSERT INTO users (nombre_usuario, correo, password) VALUES ('$nombre', '$email', '$pass')";
            if (mysqli_query($conn, $query)) {
                session_start();
                $_SESSION['usuario_id'] = mysqli_insert_id($conn);
                $_SESSION['usuario'] = $nombre;
                setcookie("usuario", $nombre, time() + (86400 * 30), "/", "", true, true); // Establece una cookie con el nombre del usuario si el registro es exitoso.
                header("Location: ../Tareas/tareas.php"); // Redirige al usuario a tareas.php después de un registro exitoso.
                exit();
            } else {
                $alertMessage = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="card p-4 shadow-lg" style="width: 25rem;">
    <div class="card-body">
      <h3 class="card-title text-center text-primary mb-4">Registro de usuario</h3>

      <?php if (!empty($alertMessage)): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <?php echo $alertMessage; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form method="post" action="registro.php">
        <div class="mb-3">
          <label for="usuario" class="form-label">Usuario</label>
          <input type="text" class="form-control" name="txtusuario" id="usuario" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" name="txtemail" id="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="txtpassword" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrar</button>
      </form>
    </div>
  </div>
</body>

</html>