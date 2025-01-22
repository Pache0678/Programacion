<?php
require_once '../controlador/SociosController.php';

$controller = new SociosController();

// Verificar si se ha enviado un ID en la URL
if (isset($_GET['id'])) {
    $id_socio = $_GET['id'];

    // Llamar al método del controlador para eliminar el socio
    $controller->eliminarSocio($id_socio);

    // Redirigir al listado después de eliminar
    header('lista_socios.php');
    exit;
} else {
    // Si no se envía ID, redirigir al listado
    header('lista_socios.php');
    exit;
}
?>
