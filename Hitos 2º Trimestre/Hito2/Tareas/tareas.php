<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../Login/login.html");
    exit();
}

include '../conexion_bd.php';

$usuario_id = $_SESSION['usuario_id'];

// Verificar si el usuario existe
$stmt = $conexion->prepare("SELECT id FROM users WHERE id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 0) {
    echo "Usuario no encontrado.";
    $stmt->close();
    exit();
}

$stmt->close();

$successMessage = '';

// Manejar la adición de nuevas tareas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'crear') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $stmt = $conexion->prepare("INSERT INTO tareas (usuario_id, titulo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $usuario_id, $titulo, $descripcion);
    if ($stmt->execute()) {
        $successMessage = "Tarea agregada exitosamente.";
    } else {
        echo "Error al agregar la tarea: " . $stmt->error;
    }
    $stmt->close();
}

// Manejar la actualización de tareas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'actualizar') {
    $tarea_id = $_POST['tarea_id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $stmt = $conexion->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ssii", $titulo, $descripcion, $tarea_id, $usuario_id);
    if ($stmt->execute()) {
        $successMessage = "Tarea actualizada exitosamente.";
    } else {
        echo "Error al actualizar la tarea: " . $stmt->error;
    }
    $stmt->close();
}

// Manejar el cambio de estado de tareas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'cambiar_estado') {
    $tarea_id = $_POST['tarea_id'];
    $nuevo_estado = $_POST['estado'] == 'pendiente' ? 'completada' : 'pendiente';
    $stmt = $conexion->prepare("UPDATE tareas SET estado = ? WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("sii", $nuevo_estado, $tarea_id, $usuario_id);
    if ($stmt->execute()) {
        $successMessage = "Estado de la tarea actualizado exitosamente.";
    } else {
        echo "Error al actualizar el estado de la tarea: " . $stmt->error;
    }
    $stmt->close();
}

// Manejar la eliminación de tareas
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $tarea_id = $_POST['tarea_id'];
    $stmt = $conexion->prepare("DELETE FROM tareas WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $tarea_id, $usuario_id);
    if ($stmt->execute()) {
        $successMessage = "Tarea eliminada exitosamente.";
    } else {
        echo "Error al eliminar la tarea: " . $stmt->error;
    }
    $stmt->close();
}

// Obtener las tareas del usuario
$stmt = $conexion->prepare("SELECT * FROM tareas WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$tareas = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div id="alert-container"></div>
        <h1 class="text-center">Gestión de Tareas</h1>
        <form method="post" action="tareas.php" class="mb-4">
            <input type="hidden" name="accion" value="crear">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
        <ul class="list-group">
            <?php foreach ($tareas as $tarea): ?>
                <li class="list-group-item">
                    <h5><?php echo htmlspecialchars($tarea['titulo']); ?></h5>
                    <p><?php echo htmlspecialchars($tarea['descripcion']); ?></p>
                    <small><?php echo htmlspecialchars($tarea['estado']); ?></small>
                    <form method="post" action="tareas.php" class="d-inline">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="tarea_id" value="<?php echo $tarea['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <form method="post" action="tareas.php" class="d-inline">
                        <input type="hidden" name="accion" value="cambiar_estado">
                        <input type="hidden" name="tarea_id" value="<?php echo $tarea['id']; ?>">
                        <input type="hidden" name="estado" value="<?php echo $tarea['estado']; ?>">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <?php echo $tarea['estado'] == 'pendiente' ? 'Marcar como completada' : 'Marcar como pendiente'; ?>
                        </button>
                    </form>
                    <button class="btn btn-secondary btn-sm" onclick="editarTarea(<?php echo $tarea['id']; ?>, '<?php echo htmlspecialchars($tarea['titulo']); ?>', '<?php echo htmlspecialchars($tarea['descripcion']); ?>')">Editar</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-4">
            <a href="../Login/Logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>

    <!-- Modal para editar tarea -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="tareas.php">
                    <div class="modal-body">
                        <input type="hidden" name="accion" value="actualizar">
                        <input type="hidden" name="tarea_id" id="editarTareaId">
                        <div class="mb-3">
                            <label for="editarTitulo" class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" id="editarTitulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="editarDescripcion" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        
        // Asigna los valores de la tarea seleccionada a los campos del formulario de edición
        function editarTarea(id, titulo, descripcion) {
            document.getElementById('editarTareaId').value = id;
            document.getElementById('editarTitulo').value = titulo;
            document.getElementById('editarDescripcion').value = descripcion;
                    
            // Muestra el modal de edición de tareas
            var editarModal = new bootstrap.Modal(document.getElementById('editarModal'));
            editarModal.show();
        }
            // Verifica si hay un mensaje de éxito para mostrar
        <?php if (!empty($successMessage)): ?>
                    // Inserta un mensaje de alerta en el contenedor de alertas
            document.getElementById('alert-container').innerHTML = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $successMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
        <?php endif; ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>