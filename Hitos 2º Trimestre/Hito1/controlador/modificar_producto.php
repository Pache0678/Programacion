<?php
include "modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (
        isset($_POST["id_usuario"]) && !empty($_POST["id_usuario"]) &&
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["edad"]) &&
        !empty($_POST["plan_base"]) &&
        !empty($_POST["duracion_suscripcion"]) &&
        isset($_POST["paquete"]) && count($_POST["paquete"]) > 0
    ) {
        $id_usuario = $_POST["id_usuario"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $edad = $_POST["edad"];
        $plan_base = $_POST["plan_base"];
        $duracion_suscripcion = $_POST["duracion_suscripcion"];
        $paquete = $_POST["paquete"];
        // Restricción 1: Usuarios menores de 18 años solo pueden contratar el Pack Infantil
        if ($edad < 18) {
            if (is_array($paquete)) {
                // Si es un array, verificar que solo contenga "Infantil"
                if (count($paquete) != 1 || !in_array("Infantil", $paquete)) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    exit(); 
                }
            } else {
                // Si es un solo valor, verificar que sea "Infantil"
                if ($paquete != "Infantil") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    exit(); 
                }
            }
        }

        // Restricción 2: Usuarios del Plan Básico solo pueden seleccionar un paquete adicional
        if ($plan_base == "Básico") {
            if (is_array($paquete) && count($paquete) > 1) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Los usuarios del Plan Básico solo pueden seleccionar un paquete adicional.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                exit(); 
            }
        }

        // Restricción 3: El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año (Anual)
        if (is_array($paquete)) {
            if (in_array("Deporte", $paquete) && $duracion_suscripcion != "Anual") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año (Anual).
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                exit(); // Detener la ejecución del script
            }
        } else {
            if ($paquete == "Deporte" && $duracion_suscripcion != "Anual") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año (Anual).
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                exit(); // Detener la ejecución del script
            }
        }
        $sql_usuario = $conexion->query("UPDATE usuarios SET 
                                        nombre='$nombre', 
                                        apellidos='$apellido', 
                                        correo_electronico='$correo', 
                                        edad=$edad, 
                                        plan_base='$plan_base', 
                                        duracion_suscripcion='$duracion_suscripcion' 
                                        WHERE id_usuario=$id_usuario");

        if ($sql_usuario === TRUE) {
            $conexion->query("DELETE FROM paquetes WHERE id_usuario=$id_usuario");

            if (is_array($paquete)) {
                foreach ($paquete as $p) {
                    $sql_paquete = $conexion->query("INSERT INTO paquetes (id_usuario, paquete) VALUES ($id_usuario, '$p')");
                    if (!$sql_paquete) {
                        echo '<div class="alert alert-danger">Error al actualizar paquete.</div>';
                    }
                }
            } else {
                $sql_paquete = $conexion->query("INSERT INTO paquetes (id_usuario, paquete) VALUES ($id_usuario, '$paquete')");
            }
            header("Location: index.php");
            echo '<div class="alert alert-success">Datos actualizados correctamente.</div>';
        } else {
            echo '<div class="alert alert-danger">Error al actualizar datos.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío.</div>';
    }
}
?>