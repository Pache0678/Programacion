<?php
class Producto {
    private $nombre;
    private $precio;
    private $cantidad;

    public function __construct($nombre, $precio, $cantidad) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
}

class ProductoImportado extends Producto {
    private $impuestoAdicional;

    public function __construct($nombre, $precio, $cantidad, $impuestoAdicional) {
        parent::__construct($nombre, $precio, $cantidad);
        $this->impuestoAdicional = $impuestoAdicional;
    }

    public function calcularPrecioFinal() {
        return $this->getPrecio() + $this->impuestoAdicional;
    }
}

// Prueba
$producto = new Producto("Producto Nacional", 100, 10);
echo "Nombre: " . $producto->getNombre() . "\n";
echo "Precio: " . $producto->getPrecio() . "\n";
echo "Cantidad: " . $producto->getCantidad() . "\n";

$productoImportado = new ProductoImportado("Producto Importado", 200, 5, 50);
echo "Nombre: " . $productoImportado->getNombre() . "\n";
echo "Precio: " . $productoImportado->getPrecio() . "\n";
echo "Cantidad: " . $productoImportado->getCantidad() . "\n";
echo "Precio Final: " . $productoImportado->calcularPrecioFinal() . "\n";
?>