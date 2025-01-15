<?php
// Clase base: Vehículo
class Vehiculo {
    // Propiedad de la clase Vehiculo
    public $marca;

    // Método para encender el vehículo
    public function encender() {
        echo "El vehículo de la marca " . $this->marca . " está encendido.\n";
    }
}

class Coche extends Vehiculo {

    public $modelo;

    // Constructor para inicializar marca y modelo
    public function __construct($marca, $modelo) {
        $this->marca = $marca;  
        $this->modelo = $modelo;  
    }
}

// Instanciamos un objeto de la clase Coche
$miCoche = new Coche("Toyota", "Corolla");

// Llamamos al método encender heredado de la clase Vehículo
$miCoche->encender();

// Mostramos la información de marca y modelo
echo "Marca: " . $miCoche->marca . "\n";
echo "Modelo: " . $miCoche->modelo . "\n";
?>
