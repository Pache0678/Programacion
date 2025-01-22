<?php
require_once '../controlador/SociosController.php';
$controller = new SociosController();

// Verificar si se ha enviado un ID en la URL
if (isset($_GET['id'])) {
    $id_socio = $_GET['id'];

    // Obtener los datos del socio por ID
    $socio = $controller->obtenerSocioPorId($id_socio);

    // Si no se encuentra el socio, redirigir al listado
    if (!$socio) {
        header('Location: lista_socios.php');
        exit;
    }
} else {
    // Redirigir al listado si no se envía ID
    header('Location: lista_socios.php');
    exit;
}

// Procesar el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Actualizar el socio
    $controller->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);

    // Redirigir al listado después de actualizar
    header('lista_socios.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Socio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Editar Socio</h2>

        <form action="editar_socio.php?id=<?= $id_socio ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= htmlspecialchars($socio['nombre']) ?>" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="<?= htmlspecialchars($socio['apellido']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($socio['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="<?= htmlspecialchars($socio['telefono']) ?>" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="<?= htmlspecialchars($socio['fecha_nacimiento']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </form>

        <br>
        <a href="lista_socios.php" class="btn btn-secondary btn-block">Volver al listado</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

