<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamWeb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos personalizados */
        body {
            background-color: #f0f2f5;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 20px;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-custom {
            width: 100%;
            margin-top: 10px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            margin: 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="header text-center mb-4">
            <h1>StreamWeb</h1>
        </div>
        <div class="row">
            <!-- Formulario de registro -->
            <div class="col-md-4 p-3">
                <div class="form-container">
                    <h3 class="text-center text-secondary mb-4">Registro de personas</h3>
                    <?php
                    include "modelo/conexion.php";
                    include "controlador/registro_persona.php";
                    include "controlador/eliminar_persona.php";
                    ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" required>
                        </div>
                        <div class="mb-3">
                            <label for="plan_base" class="form-label">Plan Base:</label>
                            <select name="plan_base" id="plan_base" class="form-select" required>
                                <option value="Básico">Básico</option>
                                <option value="Estándar">Estándar</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="duracion_suscripcion" class="form-label">Duración de la Suscripción:</label>
                            <select name="duracion_suscripcion" id="duracion_suscripcion" class="form-select" required>
                                <option value="Mensual">Mensual</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paquete Adicional:</label>
                            <div>
                                <div class="form-check">
                                    <input type="checkbox" name="paquete[]" id="deporte" value="Deporte" class="form-check-input">
                                    <label for="deporte" class="form-check-label">Deporte</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="paquete[]" id="cine" value="Cine" class="form-check-input">
                                    <label for="cine" class="form-check-label">Cine</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="paquete[]" id="infantil" value="Infantil" class="form-check-input">
                                    <label for="infantil" class="form-check-label">Infantil</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-custom" name="btnregistrar" value="ok">Registrar</button>
                    </form>
                </div>
            </div>

            <!-- Tabla de usuarios -->
            <div class="col-md-8 p-4">
                <div class="table-container">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Plan Base</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Pack adicional</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            // Precios de los planes base
                            $precios_planes = [
                                'Básico' => 9.99,
                                'Estándar' => 13.99,
                                'Premium' => 17.99,
                            ];

                            // Precios de los paquetes adicionales
                            $precios_paquetes = [
                                'Deporte' => 6.99,
                                'Cine' => 7.99,
                                'Infantil' => 4.99,
                            ];

                            // Consulta para obtener todos los usuarios
                            $sql = $conexion->query("SELECT * FROM StreamWeb.usuarios");

                            while ($datos = $sql->fetch_object()) {
                                // Obtener el precio del plan base del usuario
                                $plan_base = $datos->plan_base;
                                $precio_plan = $precios_planes[$plan_base];

                                // Consulta para obtener los paquetes del usuario actual
                                $id_usuario = $datos->id_usuario;
                                $sql_paquetes = $conexion->query("SELECT paquete FROM paquetes WHERE id_usuario = $id_usuario");

                                // Calcular el costo total de los paquetes
                                $costo_paquetes = 0;
                                $paquetes = "";
                                while ($paquete = $sql_paquetes->fetch_object()) {
                                    $paquetes .= $paquete->paquete . ", ";
                                    $costo_paquetes += $precios_paquetes[$paquete->paquete];
                                }
                                // Eliminar la última coma y espacio
                                $paquetes = rtrim($paquetes, ", ");

                                // Calcular el costo total mensual
                                $costo_total_mensual = $precio_plan + $costo_paquetes;

                                // Si la suscripción es anual, multiplicar por 12
                                $costo_total = ($datos->duracion_suscripcion == 'Anual') ? $costo_total_mensual * 12 : $costo_total_mensual;

                                // Mostrar los datos en la tabla
                                ?>
                                <tr>
                                    <td><?= $datos->id_usuario ?></td>
                                    <td><?= $datos->nombre ?></td>
                                    <td><?= $datos->apellidos ?></td>
                                    <td><?= $datos->correo_electronico ?></td>
                                    <td><?= $datos->edad ?></td>
                                    <td><?= $datos->plan_base ?></td>
                                    <td><?= $datos->duracion_suscripcion ?></td>
                                    <td><?= $paquetes ?></td>
                                    <td><?= number_format($costo_total, 2) ?> €</td>
                                    <td>
                                        <a href="modificar_producto.php?id=<?= $datos->id_usuario ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="index.php?id=<?= $datos->id_usuario ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>