<?php
class Vehiculo {
    private $marca;
    private $modelo;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function encender() {
        echo "El vehículo está encendido.\n";
    }

    protected function getMarca() {
        return $this->marca;
    }

    protected function getModelo() {
        return $this->modelo;
    }
}

class Coche extends Vehiculo {
    private $combustible;

    public function __construct($marca, $modelo, $combustible) {
        parent::__construct($marca, $modelo);
        $this->combustible = $combustible;
    }

    public function mostrarDetalles() {
        echo "Marca: " . $this->getMarca() . "\n";
        echo "Modelo: " . $this->getModelo() . "\n";
        echo "Combustible: " . $this->combustible . "\n";
    }
}

$coche = new Coche("Toyota", "Corolla", "Gasolina");
$coche->encender();
$coche->mostrarDetalles();
?>