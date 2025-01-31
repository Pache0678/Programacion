<?php
// Verifica si el parámetro "id" está presente en la URL
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    
    // Ejecuta una consulta SQL para eliminar el usuario con el id especificado
    $sql = $conexion->query("DELETE FROM usuarios WHERE id_usuario = $id");
    
    // Verifica si la consulta se ejecutó correctamente
    if ($sql == 1) {
        // Muestra un mensaje de éxito si el usuario fue eliminado correctamente
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Usuario eliminado con éxito
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
        // Muestra un mensaje de error si hubo un fallo al eliminar el usuario
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Fallo al eliminar usuario
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>
