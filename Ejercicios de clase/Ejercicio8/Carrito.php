<?php

class Carrito {
    private $productos = []; 

    public function agregarProducto($nombre, $precio, $cantidad) {
        if (isset($this->productos[$nombre])) {
            $this->productos[$nombre]['cantidad'] += $cantidad;
        } else {
            $this->productos[$nombre] = [
                'precio' => $precio,
                'cantidad' => $cantidad
            ];
        }
    }

    public function quitarProducto($nombre) {
        if (isset($this->productos[$nombre])) {
            unset($this->productos[$nombre]);  
            echo "Producto '{$nombre}' ha sido eliminado del carrito.\n";
        } else {
            echo "El producto '{$nombre}' no está en el carrito.\n";
        }
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];  
        }
        return $total;
    }

    public function mostrarDetalleCarrito() {
        if (empty($this->productos)) {
            echo "El carrito está vacío.\n";
        } else {
            echo "Detalle del Carrito:\n";
            foreach ($this->productos as $nombre => $producto) {
                echo "{$nombre}: {$producto['cantidad']} x {$producto['precio']}€ = " . ($producto['cantidad'] * $producto['precio']) . "€\n";
            }
        }
    }
}

$carrito = new Carrito();

$carrito->agregarProducto("Camiseta", 20, 2);
$carrito->agregarProducto("Pantalones", 40, 1);
$carrito->agregarProducto("Zapatos", 50, 1);

$carrito->mostrarDetalleCarrito();

echo "Total del carrito: " . $carrito->calcularTotal() . "€\n\n";

$carrito->quitarProducto("Pantalones");

$carrito->mostrarDetalleCarrito();

echo "Total del carrito después de eliminar Pantalones: " . $carrito->calcularTotal() . "€\n";

?>
