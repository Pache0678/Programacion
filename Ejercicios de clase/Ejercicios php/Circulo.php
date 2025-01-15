<?php
class Circulo {
    public $radio;
    public function __construct($radio) {
        $this->radio = $radio;
    }
    //Metodo para calcular el area
    public function calcularArea(){
        return pi() * pow($this->radio, 2);
    }
    //Objeto de la clase 
}

$Micirculo = new Circulo(5);
$area = $Micirculo->calcularArea();
echo "El área del círculo con radio 5 es: " . $area . "\n";
?>