<?php

class Producto {
    protected $nombre;
    protected $precio;

    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function mostrarDetalles() {
        echo "Producto: {$this->nombre}\n";
        echo "Precio: {$this->precio}€\n";
    }
}

class Electrodomestico extends Producto {
    private $consumo;

    public function __construct($nombre, $precio, $consumo) {
        parent::__construct($nombre, $precio);  
        $this->consumo = $consumo;
    }

    public function mostrarDetalles() {
        parent::mostrarDetalles();  
        echo "Consumo: {$this->consumo} kWh\n";  
    }
}

$producto = new Producto("Camiseta", 15);

$electrodomestico = new Electrodomestico("Lavadora", 300, 1.2);

echo "Detalles del Producto:\n";
$producto->mostrarDetalles();
echo "\n";

echo "Detalles del Electrodoméstico:\n";
$electrodomestico->mostrarDetalles();

?>
