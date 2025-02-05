<?php
function convertirTemperatura($valor, $unidad) {
    try {
        if (!is_numeric($valor)) {
            throw new Exception("Error: El valor debe ser un número.");
        }
        
        if ($unidad === "C") {
            return ($valor - 32) * 5 / 9;
        } elseif ($unidad === "F") {
            return ($valor * 9 / 5) + 32;
        } else {
            throw new Exception("Error: Unidad de conversión inválida. Use 'C' para Celsius o 'F' para Fahrenheit.");
        }
    } catch (Exception $e) {
        file_put_contents("errores.log", $e->getMessage() . PHP_EOL, FILE_APPEND);
        return "Error registrado en errores.log";
    }
}

echo "Ingrese un valor de temperatura: ";
$valor = trim(fgets(STDIN));
$valor = is_numeric($valor) ? (float)$valor : $valor;

echo "Ingrese la unidad de conversión (C para Celsius, F para Fahrenheit): ";
$unidad = trim(fgets(STDIN));

echo convertirTemperatura($valor, strtoupper($unidad)) . PHP_EOL;
?>
