<?php
require_once("modelo/tablas.php");

// Leer encabezado y pie
$encabezado = file_get_contents("vistas/encabezado.html");
$pie = file_get_contents("vistas/pie.html");

// Determinar la opción seleccionada
$opcion = $_GET['opcion'] ?? 'clientes';

// Generar contenido según la opción
if ($opcion === 'clientes') {
    $contenido = generarTabla("datos/clientes.csv", "cliente");
} elseif ($opcion === 'articulos') {
    $contenido = generarTabla("datos/articulos.csv", "articulo");
} elseif ($opcion === 'proveedores') {
    $contenido = generarTabla("datos/proveedores.csv", "proveedor");
} elseif ($opcion === 'añadir_cliente') {
    $contenido = file_get_contents("vistas/formulario_cliente.html");
} elseif ($opcion === 'modificar_cliente') {
    $contenido = file_get_contents("modificar_cliente.php");
} elseif ($opcion === 'eliminar_cliente') {
    $contenido = file_get_contents("listar_clientes.php");
} else {
    $contenido = "<p>Opción no válida</p>";
}

// Renderizar la página
echo $encabezado . $contenido . $pie;
?>