<?php

class ConversorMoneda {
    private $factorConversionDolaresAEuros = 0.85; 
    private $factorConversionEurosADolares = 1.18; 

    public function convertirDolaresAEuros($dolares) {
        return $dolares * $this->factorConversionDolaresAEuros;
    }

    public function convertirEurosADolares($euros) {
        return $euros * $this->factorConversionEurosADolares;
    }
}

$convertidor = new ConversorMoneda();


$dolares = 100; 
$euros = 50;    

$eurosConvertidos = $convertidor->convertirDolaresAEuros($dolares);
echo "{$dolares} dólares son {$eurosConvertidos} euros.\n";

$dolaresConvertidos = $convertidor->convertirEurosADolares($euros);
echo "{$euros} euros son {$dolaresConvertidos} dólares.\n";

?>
