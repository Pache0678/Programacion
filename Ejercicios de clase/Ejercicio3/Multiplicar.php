<?php
function tablaMultiplicar($numero) {
    try {
        if (!is_int($numero) || $numero <= 0) {
            throw new Exception("Error: El número debe ser un entero positivo.");
        }
        
        for ($i = 1; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . PHP_EOL;
        }
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

echo "Ingrese un número: ";
$numero = trim(fgets(STDIN));
$numero = is_numeric($numero) ? (int)$numero : $numero; // Convertir a número si es posible

tablaMultiplicar($numero);
?>