<?php
include "modelo/conexion.php";
$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-3 m-auto" method="post">
    <h3 class="text-center text-secondary">Modificar Registros</h3>
    <?php
    include "controlador/modificar_producto.php";
    while ($datos = $sql->fetch_object()) { 
        // Obtener los paquetes seleccionados del usuario
        $paquete_sql = $conexion->query("SELECT paquete FROM paquetes WHERE id_usuario = $id");
        $paquete = [];
        while ($paquete_datos = $paquete_sql->fetch_object()) {
            $paquete[] = $paquete_datos->paquete;
        }
    ?>
        <input type="hidden" name="id_usuario" value="<?= $datos->id_usuario ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" name="apellido" value="<?= $datos->apellidos ?>">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electronico</label>
            <input type="email" class="form-control" name="correo" value="<?= $datos->correo_electronico ?>">
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" name="edad" value="<?= $datos->edad ?>">
        </div>
        <div class="mb-3">
            <label for="plan_base" class="form-label">Plan Base:</label>
            <select name="plan_base" id="plan_base" class="form-select" required>
                <option value="Básico" <?= ($datos->plan_base == 'Básico') ? 'selected' : '' ?>>Básico</option>
                <option value="Estándar" <?= ($datos->plan_base == 'Estándar') ? 'selected' : '' ?>>Estándar</option>
                <option value="Premium" <?= ($datos->plan_base == 'Premium') ? 'selected' : '' ?>>Premium</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="duracion_suscripcion" class="form-label">Duración de la Suscripción:</label>
            <select name="duracion_suscripcion" id="duracion_suscripcion" class="form-select" required>
                <option value="Mensual" <?= ($datos->duracion_suscripcion == 'Mensual') ? 'selected' : '' ?>>Mensual</option>
                <option value="Anual" <?= ($datos->duracion_suscripcion == 'Anual') ? 'selected' : '' ?>>Anual</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Paquete Adicional:</label>
            <div>
                <div class="form-check">
                    <input type="checkbox" name="paquete[]" id="deporte" value="Deporte" class="form-check-input" <?= (in_array('Deporte', $paquete)) ? 'checked' : '' ?>>
                    <label for="deporte" class="form-check-label">Deporte</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="paquete[]" id="cine" value="Cine" class="form-check-input" <?= (in_array('Cine', $paquete)) ? 'checked' : '' ?>>
                    <label for="cine" class="form-check-label">Cine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="paquete[]" id="infantil" value="Infantil" class="form-check-input" <?= (in_array('Infantil', $paquete)) ? 'checked' : '' ?>>
                    <label for="infantil" class="form-check-label">Infantil</label>
                </div>
            </div>
        </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>