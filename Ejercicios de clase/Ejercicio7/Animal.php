<?php

class Animal {
    protected $especie;

    public function __construct($especie) {
        $this->especie = $especie;
    }

    public function obtenerEspecie() {
        return $this->especie;
    }

    public function emitirSonido() {
        echo "El {$this->especie} emite un sonido.\n";
    }
}

class Perro extends Animal {
    private $raza;

    public function __construct($especie, $raza) {
        parent::__construct($especie);  
        $this->raza = $raza;
    }

    public function emitirSonido() {
        echo "El perro de raza {$this->raza} dice: ¡Guau!\n";
    }

    public function obtenerRaza() {
        return $this->raza;
    }
}

$miPerro = new Perro("Perro", "Labrador");

echo "Especie: " . $miPerro->obtenerEspecie() . "\n";  
echo "Raza: " . $miPerro->obtenerRaza() . "\n";  
$miPerro->emitirSonido(); 

?>
