<?php
require_once 'funciones.php'; // Importar las funciones

$archivo = "datos/clientes.csv";
$clientes = leerClientes($archivo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cliente</title>
</head>
    <h2>Eliminar Cliente</h2>
    <form action="eliminar_cliente.php" method="POST">
        <label for="id">ID del Cliente a Eliminar:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>