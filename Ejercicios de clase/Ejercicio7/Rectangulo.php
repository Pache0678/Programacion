<?php
class Rectangulo {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

echo "Ingrese la base del rectángulo: ";
$base = trim(fgets(STDIN));
$base = is_numeric($base) ? (float)$base : 0;

echo "Ingrese la altura del rectángulo: ";
$altura = trim(fgets(STDIN));
$altura = is_numeric($altura) ? (float)$altura : 0;

$rectangulo = new Rectangulo($base, $altura);
echo "El área del rectángulo es: " . $rectangulo->calcularArea() . PHP_EOL;
?>