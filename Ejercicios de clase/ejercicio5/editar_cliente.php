<?php
require_once 'funciones.php'; // Importar las funciones
$archivo = "datos/clientes.csv";
$id = $_POST["id"] ?? null;

if ($id !== null) {
    $clientes = leerClientes($archivo);
    $clienteSeleccionado = null;

    // Buscar el cliente por su ID
    foreach ($clientes as $index => $cliente) {
        if ($index > 0 && $cliente[0] == $id) { // Saltar la cabecera
            $clienteSeleccionado = $cliente;
            break;
        }
    }

    if ($clienteSeleccionado !== null): // Si se encontró el cliente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="actualizar_cliente.php" method="POST">
        <input type="hidden" name="id" value="<?= $clienteSeleccionado[0] ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $clienteSeleccionado[1] ?>" required>
        <br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?= $clienteSeleccionado[2] ?>" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?= $clienteSeleccionado[3] ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php
    else:
        echo "<h1>Error: Cliente no encontrado</h1>";
        echo "<a href='modificar_cliente.php'>Volver al listado</a>";
    endif;
}
?>