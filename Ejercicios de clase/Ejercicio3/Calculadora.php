<?php
function calculadora($num1, $num2, $operador) {
    try {
        if (!is_numeric($num1) || !is_numeric($num2)) {
            throw new Exception("Error: Los valores ingresados deben ser números.");
        }

        switch ($operador) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                if ($num2 == 0) {
                    echo"Error: División por cero no permitida.";
                }
                return $num1 / $num2;
            default:
                echo"Error: Operador no válido. Usa +, -, * o /.";
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Capturar entrada del usuario
echo "Ingrese el primer número: ";
$num1 = trim(fgets(STDIN));

echo "Ingrese el segundo número: ";
$num2 = trim(fgets(STDIN));

echo "Ingrese el operador (+, -, *, /): ";
$operador = trim(fgets(STDIN));

// Llamar a la función y mostrar el resultado
$resultado = calculadora($num1, $num2, $operador);
echo "Resultado: " . $resultado
?>
