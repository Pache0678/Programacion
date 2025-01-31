<?php
include "modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    // Verificar que todos los campos obligatorios no estén vacíos
    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellido"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["edad"]) &&
        !empty($_POST["plan_base"]) &&
        !empty($_POST["duracion_suscripcion"]) &&
        !empty($_POST["paquete"])
    ) {
        // Asignar los valores del formulario a variables
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $edad = $_POST["edad"];
        $plan_base = $_POST["plan_base"];
        $duracion_suscripcion = $_POST["duracion_suscripcion"];
        $paquete = $_POST["paquete"]; // Este campo puede ser un array si se permiten múltiples selecciones

        // Restricción 1: Usuarios menores de 18 años solo pueden contratar el Pack Infantil
        if ($edad < 18) {
            if (is_array($paquete)) {
                // Si es un array, verificar que solo contenga "Infantil"
                if (count($paquete) != 1 || !in_array("Infantil", $paquete)) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    exit(); // Detener la ejecución del script
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
                exit(); 
            }
        } else {
            if ($paquete == "Deporte" && $duracion_suscripcion != "Anual") {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        El Pack Deporte solo puede ser contratado si la duración de la suscripción es de 1 año (Anual).
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                exit(); 
            }
        }


        // Insertar el usuario en la tabla 'usuarios'
        $sql_usuario = $conexion->query("INSERT INTO usuarios (nombre, apellidos, correo_electronico, edad, plan_base, duracion_suscripcion)
                                        VALUES ('$nombre', '$apellido', '$correo', $edad, '$plan_base', '$duracion_suscripcion')");

        if ($sql_usuario === TRUE) {
            // Obtener el ID del usuario recién insertado
            $id_usuario = $conexion->insert_id;

            // Insertar los paquetes en la tabla 'paquetes'
            if (is_array($paquete)) {
                // Si el campo 'paquete' es un array (múltiples selecciones)
                foreach ($paquete as $p) {
                    $sql_paquete = $conexion->query("INSERT INTO paquetes (id_usuario, paquete) VALUES ($id_usuario, '$p')");
                    if (!$sql_paquete) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Error al registrar el paquete: ' . $conexion->error . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                    }
                }
            } else {
                // Si el campo 'paquete' es un solo valor
                $sql_paquete = $conexion->query("INSERT INTO paquetes (id_usuario, paquete) VALUES ($id_usuario, '$paquete')");
                if (!$sql_paquete) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Error al registrar el paquete: ' . $conexion->error . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
            }

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Persona registrada correctamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al registrar la persona: ' . $conexion->error . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    } else {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Alguno de los campos está vacío.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>