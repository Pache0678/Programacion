<?php
class CuentaBancaria {
    private $titular;
    private $saldo;
    private $tipoCuenta;

    public function __construct($titular, $tipoCuenta) {
        $this->titular = $titular;
        $this->tipoCuenta = $tipoCuenta;
        $this->saldo = 0;
    }

    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
        }
    }

    public function retirar($cantidad) {
        if ($this->verificarSaldoSuficiente($cantidad)) {
            $this->saldo -= $cantidad;
        } else {
            echo "Saldo insuficiente para retirar $cantidad.\n";
        }
    }

    private function verificarSaldoSuficiente($cantidad) {
        return $this->saldo >= $cantidad;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria("Juan Perez", "Ahorro");
$cuenta->depositar(1000);
$cuenta->retirar(500);
$cuenta->retirar(600); // Esto debería mostrar un mensaje de saldo insuficiente
echo "Saldo final: " . $cuenta->getSaldo() . "\n";
?>