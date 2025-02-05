<?php

class CuentaBancaria {
    private $titular;
    private $saldo;
    private $tipoDeCuenta;

    public function __construct($titular, $saldoInicial, $tipoDeCuenta) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        $this->tipoDeCuenta = $tipoDeCuenta;
    }

    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Has depositado {$cantidad}€. Nuevo saldo: {$this->saldo}€.\n";
        } else {
            echo "La cantidad a depositar debe ser mayor que cero.\n";
        }
    }

    public function retirar($cantidad) {
        if ($cantidad <= $this->saldo && $cantidad > 0) {
            $this->saldo -= $cantidad;
            echo "Has retirado {$cantidad}€. Nuevo saldo: {$this->saldo}€.\n";
        } else {
            echo "No tienes suficiente saldo o la cantidad es inválida.\n";
        }
    }

    public function mostrarInfo() {
        echo "Titular: {$this->titular}\n";
        echo "Tipo de cuenta: {$this->tipoDeCuenta}\n";
        echo "Saldo actual: {$this->saldo}€\n";
    }
}

$miCuenta = new CuentaBancaria("Juan Pérez", 1000, "Corriente");

// Realizar algunas operaciones
$miCuenta->depositar(500);    
$miCuenta->retirar(200);      
$miCuenta->depositar(-50);    
$miCuenta->retirar(1500);     

$miCuenta->mostrarInfo();

?>
