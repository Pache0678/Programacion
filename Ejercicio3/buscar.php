<?php
// Definir un manejador de errores personalizado
function manejarError($errstr) {
    echo "Error: $errstr" . PHP_EOL;
}

// Establecer el manejador de errores personalizado
set_error_handler("manejarError");

function buscarElemento($array, $valor) {
    $posicion = array_search($valor, $array);
    
    if ($posicion !== false) {
        return "Elemento encontrado en la posición: $posicion";
    } else {
        trigger_error("El elemento '$valor' no se encuentra en el array.", E_USER_WARNING);
        return null;
    }
}

// Definir el array
$array = ["manzana", "naranja", "pera"];

// Solicitar entrada del usuario
echo "Ingrese un valor a buscar: ";
$valor = trim(fgets(STDIN));

// Buscar el elemento y mostrar el resultado
echo buscarElemento($array, $valor) . PHP_EOL;
?>